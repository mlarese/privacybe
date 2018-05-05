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
    private function createPrivacyTables() {
        $dbScript = realpath(__DIR__ . "/../../privacy_create.sql");
        if(!file_exists($dbScript))
            throw new \RuntimeException("The SQL file privacy_create not exists");

        $sql = file_get_contents($dbScript);
        $this->executeConfigSql($sql);
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

        try {
            $body = $request->getParsedBody();

            $newOwner
                ->setLanguage( $this->getAttribute('language',$body))
                ->setEmail($this->getAttribute('email',$body, true))
                ->setName($this->getAttribute('name',$body))
                ->setSurname($this->getAttribute('surname',$body))
                ->setCompany($this->getAttribute('company',$body,true))
            ;
        } catch(Exception $e) {
            return $response->withStatus(500, 'Missing parameter ' . $e->getMessage());
        }
        $this->getEmConfig()->getConnection()->beginTransaction(); // suspend auto-commit


        try {
            $msg = "persisting owner";
            $this->getEmConfig()->persist($newOwner);
                $msg = "after persist owner";
                $this->getEmConfig()->flush();
                $currentOwnerId = $newOwner->getId();

            $newUser
                ->setUser( $newOwner->getEmail())
                ->setOwnerId( $newOwner->getId())
                ->setName( $newOwner->getCompany() . ' admin')
                ->setType('owner')
                ->setPassword('pwdprivacyuser')
            ;

            $this->getEmConfig()->persist($newUser);
                $this->getEmConfig()->flush();
                $currentUserId = $newUser->getId();

            $newDb = "privacy_$currentOwnerId";
            $dbUser = "prvusr_$currentOwnerId";
            $dbpwd = "pwdprivacyuser";

            $msg = "after setting parameters";

            $done = $this->createOwnerDb($newDb);
            $msg = "after creating $newDb";

            $msg = "creating db user";
            $this->createDbUser($dbUser,$dbpwd);

            $this->createPrivacyTables();

            $newOperator
                ->setEmail($newOwner->getEmail())
                ->setId($currentUserId)
                ->setPeriodFrom(new \DateTime())
                ->setRole('owner')
                ->setName($newOwner->getName())
                ->setSurname($newOwner->getSurname())
            ;

            // correggere con privacydb
            $this->getEmConfig()->persist($newOperator);
            $this->getEmConfig()->flush();

            return $response->withJson( $this->toJson($newOwner));
        } catch (Exception $e) {
            $this->getEmConfig()->getConnection()->rollBack();
            echo $e->getMessage();
            return $response->withStatus(500, "Error creating owner - $msg - ");
        }

    }
}
