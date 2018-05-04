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
        $sql = "CREATE DATABASE $db;";
        $stmt = $this->getEmConfig()->getConnection()->prepare($sql);
        return $stmt->execute();
    }

    /**
     * @param $dbName
     * @param $user
     * @param $password
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    private function createDbUser($dbName, $user, $password) {
        $sql = "CREATE USER '$user'@'localhost' IDENTIFIED BY '$password'";
        $stmt = $this->getEmConfig()->getConnection()->prepare($sql);
        $stmt->execute();

        $sql = "CREATE USER '$user'@'%' IDENTIFIED BY '$password'";
        $stmt = $this->getEmConfig()->getConnection()->prepare($sql);
        $stmt->execute();

        $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON *.* to $user@localhost IDENTIFIED BY '$password';";
        $stmt = $this->getEmConfig()->getConnection()->prepare($sql);
        $stmt->execute();

        $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON *.* to $user@'%' IDENTIFIED BY '$password';";
        $stmt = $this->getEmConfig()->getConnection()->prepare($sql);
        $stmt->execute();
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
        $no = new Owner();
        $nu = new User();
        $nop = new Operator();

        try {
            $body = $request->getParsedBody();

            $no
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
            $msg = "persisting";
            $this->getEmConfig()->persist($no);
                $msg = "after persist";
                $this->getEmConfig()->flush();
                $currentOwnerId = $no->getId();

            $nu
                ->setUser( $no->getEmail())
                ->setOwnerId( $no->getId())
                ->setName( $no->getCompany() . ' admin')
                ->setType('owner')
                ->setPassword('pwdprivacyuser')
                ->setRefId(1)
            ;

            $newDb = "privacy_$currentOwnerId";
            $dbUser = "prvusr_$currentOwnerId";
            $dbpwd = "pwdprivacyuser";

            $msg = "after setting parameters";

            $done = $this->createOwnerDb($newDb);
            $msg = "after creating $newDb";

            $msg = "creating db user";
            $this->createDbUser($newDb,$dbUser,$dbpwd);





            return $response->withJson( $this->toJson($no));
        } catch (Exception $e) {
            $this->getEmConfig()->getConnection()->rollBack();
            echo $e->getMessage();
            return $response->withStatus(500, "Error creating owner - $msg - ");
        }

    }
}
