<?php

namespace App\Action;


use App\Entity\Config\Owner;
use App\Entity\Config\User;
use App\Entity\Privacy\Operator;
use Exception;
use function print_r;
use Slim\Http\Request;
use Slim\Http\Response;

class Owners extends AbstractAction
{
    /**
     * @param $ownerId
     *
     * @return bool
     * @throws \Doctrine\DBAL\DBALException
     */
    private function createOwnerDb ($db) {
        return $this->executeConfigSql("CREATE DATABASE $db;");
    }

    /**
     * @param $dbName
     * @param $user
     * @param $password
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    private function createDbUser($user, $password) {
        $this->executeConfigSql("CREATE USER '$user'@'localhost' IDENTIFIED BY '$password'");
        $this->executeConfigSql("CREATE USER '$user'@'%' IDENTIFIED BY '$password'");
        $this->executeConfigSql("GRANT SELECT, INSERT, UPDATE, DELETE ON *.* to $user@localhost IDENTIFIED BY '$password';");
        $this->executeConfigSql("GRANT SELECT, INSERT, UPDATE, DELETE ON *.* to $user@'%' IDENTIFIED BY '$password';");
    }

    /**
     * @throws \Doctrine\DBAL\DBALException
     * @throws \RuntimeException
     */
    private function createPrivacyTables($db) {
        $sql = "
        CREATE TABLE $db.privacy (id INT AUTO_INCREMENT NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP, privacy LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', privacy_id INT NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX privacy_history_created (created), INDEX privacy_history_privacy_id (privacy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
        CREATE TABLE $db.domain (name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, active TINYINT(1) DEFAULT '1' NOT NULL, deleted TINYINT(1) DEFAULT '0' NOT NULL, INDEX domain_active (active), PRIMARY KEY(name)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
        CREATE TABLE $db.action_history (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, history LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', user_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
        CREATE TABLE $db.term (uid VARCHAR(128) NOT NULL, options LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)',name VARCHAR(255) NOT NULL, paragraphs LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', status VARCHAR(30) NOT NULL, published DATETIME DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP, modified DATETIME DEFAULT CURRENT_TIMESTAMP, suspended DATETIME DEFAULT NULL, deleted TINYINT(1) DEFAULT '0' NOT NULL, INDEX term_created (created), INDEX term_suspended (suspended), INDEX term_published (published), INDEX term_modified (modified), PRIMARY KEY(uid)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
        CREATE TABLE $db.term_history (id INT AUTO_INCREMENT NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP, term LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', term_uid VARCHAR(128) NOT NULL, modifier INT NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX term_history_created (created), INDEX term_history_modifier (modifier), INDEX term_history_term_uid (term_uid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
        CREATE TABLE $db.privacy_entry (
            uid VARCHAR(120) NOT NULL, 
            created DATETIME DEFAULT CURRENT_TIMESTAMP, 
            email VARCHAR(100) NOT NULL, 
            name VARCHAR(100) NOT NULL, 
            ref VARCHAR(100) DEFAULT NULL, 
            surname VARCHAR(100) NOT NULL, 
            form LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', 
            crypted_form LONGTEXT DEFAULT NULL, 
            privacy LONGTEXT DEFAULT NULL, 
            privacy_flags LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', 
            term_id VARCHAR(255) NOT NULL, 
            domain VARCHAR(255) NOT NULL, 
            site VARCHAR(255) NOT NULL, 
            ip VARCHAR(100) DEFAULT NULL, 
            telephone VARCHAR(120) DEFAULT NULL, 
            deleted TINYINT(1) DEFAULT '0' NOT NULL, 
            INDEX privacy_created (created), INDEX privacy_name_surname (name, surname), 
            INDEX privacy_ref (ref), 
            INDEX privacy_email (email), 
            PRIMARY KEY(uid)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
        CREATE TABLE $db.operator (id INT NOT NULL, name VARCHAR(80) NOT NULL, surname VARCHAR(80) NOT NULL, zip VARCHAR(10) DEFAULT NULL, email VARCHAR(150) DEFAULT NULL, telephone VARCHAR(100) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, role VARCHAR(50) NOT NULL, profile LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', period_from DATETIME NOT NULL, period_to DATETIME NULL, domains LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', deleted TINYINT(1) DEFAULT '0' NOT NULL, active TINYINT(1) DEFAULT '1' NOT NULL, INDEX operator_name (name), INDEX operator_role (role), INDEX operator_period_from (period_from), INDEX operator_period_to (period_to), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
        CREATE TABLE $db.term_page (term_uid VARCHAR(255) NOT NULL, domain VARCHAR(255) NOT NULL, page VARCHAR(255) NOT NULL, deleted TINYINT(1) DEFAULT '0' NOT NULL, PRIMARY KEY(term_uid, domain, page)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
        CREATE TABLE $db.treatment (code VARCHAR(30) NOT NULL, name VARCHAR(255) NOT NULL, note LONGTEXT DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, creator LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', deleted TINYINT(1) DEFAULT '0' NOT NULL, PRIMARY KEY(code)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
        ";

        $this->executeConfigSql($sql);
    }

    /**
     * @param $owner Owner
     *
     * @return mixed
     * @throws Exception
     */
    private function fillOwner(&$owner, $body) {
        $owner
            ->setLanguage( $this->getAttribute('language',$body))
            ->setEmail($this->getAttribute('email',$body, true))
            ->setName($this->getAttribute('name',$body))
            ->setSurname($this->getAttribute('surname',$body))
            ->setCity($this->getAttribute('city',$body))
            ->setZip($this->getAttribute('zip',$body))
            ->setAddress($this->getAttribute('address',$body))
            ->setCountry($this->getAttribute('country',$body))
            ->setCounty($this->getAttribute('county',$body,true))
            ->setCompany($this->getAttribute('company',$body,true))

        ;

        return $owner;
    }
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     *
     * @return mixed
     * @throws \Doctrine\DBAL\DBALException
     */
    public function newOwner($request, $response, $args) {
        $newOwner = new Owner();
        $newUser = new User();
        $newOperator = new Operator();
        $repoUser = $this->getEmConfig()->getRepository( User::class);
        $repoOwner = $this->getEmConfig()->getRepository( Owner::class);

        try {
            $body = $request->getParsedBody();
            $userName = $this->getAttribute('user',$body,true);
            $userPassword = $this->getAttribute('password',$body, true);

            /**
             * @var User $exUsr
             */
            $exUsr = $repoUser->findOneBy(['user' => $body['user'] ] );
            if($exUsr && $exUsr->getUser() === $body['user']) {
                return $response->withStatus(500,"user alredy registered");
            }

            $this->fillOwner($newOwner, $body);

        } catch(Exception $e) {
            return $response->withStatus(500, 'Missing parameter ' . $e->getMessage());
        }

        try{
            /**
             * @var $exOwn Owner
             */
            $exOwn = $repoOwner->findOneBy(['company' => $body['company'] ] );
            if($exOwn && $exOwn->getCompany() === $body['company']) {
                return $response->withStatus(500,"company alredy registered");
            }

            $exOwn = $repoOwner->findOneBy(['email' => $body['email'] ] );
            if($exOwn && $exOwn->getEmail() === $body['email']) {
                return $response->withStatus(500,"email alredy registered");
            }

            $this->getEmConfig()->getConnection()->beginTransaction();
        } catch(Exception $e) {
            return $response->withStatus(500, 'Error ' . $e->getMessage());
        }

        try {

            /***************************************************
             * creating Owner
             **************************************************/
            $msg = "persisting owner";
            $this->getEmConfig()->persist($newOwner);
                $msg = "after persist owner";
                $this->getEmConfig()->flush();
                $currentOwnerId = $newOwner->getId();

            /***************************************************
             * creating User
             **************************************************/
            $newUser
                ->setUser( $userName)
                ->setOwnerId( $newOwner->getId())
                ->setName( $newOwner->getCompany() . ' admin')
                ->setType('owners')
                ->setPassword(md5($userPassword))
            ;

            $this->getEmConfig()->persist($newUser);
                $this->getEmConfig()->flush();
                $currentUserId = $newUser->getId();

            $newDb = "privacy_$currentOwnerId";
            $dbUser = "prvusr_$currentOwnerId";
            $dbpwd = "pwdprivacyuser";

            $msg = "after setting parameters";

            /***************************************************
             * creating Privacy db
             **************************************************/
            $done = $this->createOwnerDb($newDb);
            $msg = "after creating $newDb";

            $msg = "creating db user";
            $this->createDbUser($dbUser,$dbpwd);

            /***************************************************
             * adding tables to Privacy db
             **************************************************/
            $msg = "creating PrivacyTables";
            $this->createPrivacyTables($newDb);

            /***************************************************
             * creating privacy owner Operator
             **************************************************/
            $newOperator
                ->setEmail($newOwner->getEmail())
                ->setId($currentUserId)
                ->setPeriodFrom(new \DateTime())
                ->setRole('owner')
                ->setName($newOwner->getName())
                ->setSurname($newOwner->getSurname())
            ;

            $prEm = $this->getEmPrivacy($currentOwnerId, $dbUser, $dbpwd);
            $prEm->persist($newOperator);
            $prEm->flush();

            return $response->withJson( $this->toJson($newOwner));
        } catch (Exception $e) {
            $this->getEmConfig()->getConnection()->rollBack();

            if(false) {
                if ($newUser && $newUser->getId())
                    $this->getEmConfig()->remove($newUser);
                if ($newOwner && $newOwner->getId())
                    $this->getEmConfig()->remove($newOwner);
                if ($newOperator && $newOperator->getId())
                    $this->getEmConfig()->remove($newOperator);
                if ($prEm)
                    $prEm->remove($newOperator);
            }

            // echo $e->getMessage();
            return $response->withStatus(500, "Error creating owner - $msg ");
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     *
     * @return mixed
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getOwners($request, $response, $args) {
        $owR = $this->getEmConfig()->getRepository(Owner::class);
        $owners = [];


        try{
            $owners = $owR->findBy(["active" => 1, "deleted"=>0]);

        }catch(Exception $e) {
            // die($e->getMessage());
            return $response->withStatus(500, 'Error loading owners');
        }

        return $response->withJson( $this->toJson($owners));
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getOwnerById($request, $response, $args) {
        $currId = $args['id'];
        /**
         * @var EntityManager $em
         */
        $em = $this->getEmConfig();

        /** @var Owner $res */
        $res = $em->find(Owner::class, $currId);

        if(!$res) {
            return $response->withStatus(500, 'Not found');
        }

        $js = $this->toJson($res);
        return $response->withJson( $js);
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function updateOwner($request, $response, $args) {
        $currId = $args['id'];
        /**
         * @var EntityManager $em
         */
        $em = $this->getEmConfig();

        /**
         * @var Owner $res
         */
        $res = $em->find(Owner::class, $currId);

        if(!$res) {
            return $response->withStatus(500, 'Not found');
        }

        try {
            $body = $request->getParsedBody();
            $this->fillOwner($res, $body);
        } catch(Exception $e) {
            return $response->withStatus(500, 'Error ' . $e->getMessage());
        }


        try {
            $this->getEmConfig()->merge($res);
            $this->getEmConfig()->flush();
        } catch(Exception $e) {
            return $response->withStatus(500, 'Error updating record');
        }

        $js = $this->toJson($this->success());
        return $response->withJson( $js);
    }
}
