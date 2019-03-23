<?php
namespace API\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * OAuthUser
 * @ORM\Entity
 * @ORM\Table(name="oauth_users")
 * @ORM\Entity(repositoryClass="API\Repository\OAuthUserRepository")
 */
class OAuthUser
{

    use EncryptableFieldEntity;
    /**
     * @ORM\Id
     * @ORM\Column(name="username", type="string", nullable=false)
     **/
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $this->encryptField($password);
        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Verify user's password
     *
     * @param string $password
     * @return Boolean
     */
    public function verifyPassword($password)
    {
        return $this->verifyEncryptedFieldValue($this->getPassword(), $password);
    }

    public function toArray()
    {
        return [
            'user_id' => $this->id,
            'scope' => null,
        ];
    }
}