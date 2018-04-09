<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="privacy_domain",
 *      uniqueConstraints={@ORM\UniqueConstraint(name="domain_code_unique", columns={"code"})}
 * )
 */
class PrivacyDomain {
    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return PrivacyDomain
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @param mixed $code
     *
     * @return PrivacyDomain
     */
    public function setCode($code) {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return PrivacyDomain
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHost() {
        return $this->host;
    }

    /**
     * @param mixed $host
     *
     * @return PrivacyDomain
     */
    public function setHost($host) {
        $this->host = $host;
        return $this;
    }
    /**
     * @ORM\Id
     * @ORM\Column(name="domain_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\column(type="string", length=20, nullable=false )
     */
    protected $code;
    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=40, nullable=false)
     */
    protected $host;

}