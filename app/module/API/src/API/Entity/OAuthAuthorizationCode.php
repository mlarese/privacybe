<?php
namespace API\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 *
 * @ORM\Entity
 * @ORM\Table(name="oauth_authorization_codes")
 * @ORM\Entity(repositoryClass="API\Repository\OAuthAuthorizationCodeRepository")
 * OAuthAuthorizationCode
 */
class OAuthAuthorizationCode
{
    /**
     * @ORM\Id
     * @ORM\Column(name="authorization_code", type="string", nullable=false)
     **/
    private $id;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $client_id;

    /**
     * @var string
     */
    private $user_id;

    /**
     * @var \DateTime
     */
    private $expires;

    /**
     * @var string
     */
    private $redirect_uri;

    /**
     * @var string
     */
    private $scope;

    /**
     * @var \API\Entity\OAuthClient
     */
    private $client;

    /**
     * @var \API\Entity\OAuthUser
     */
    private $user;

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
     * Set code
     *
     * @param string $code
     * @return OAuthAuthorizationCode
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set client_id
     *
     * @param string $clientId
     * @return OAuthAuthorizationCode
     */
    public function setClientId($clientId)
    {
        $this->client_id = $clientId;

        return $this;
    }

    /**
     * Get client_id
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Set user_id
     *
     * @param string $userIdentifier
     * @return OAuthAuthorizationCode
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_identifier
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set expires
     *
     * @param \DateTime $expires
     * @return OAuthAuthorizationCode
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set redirect_uri
     *
     * @param string $redirectUri
     * @return OAuthAuthorizationCode
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirect_uri = $redirectUri;

        return $this;
    }

    /**
     * Get redirect_uri
     *
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirect_uri;
    }

    /**
     * Set scope
     *
     * @param string $scope
     * @return OAuthAuthorizationCode
     */
    public function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Get scope
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set client
     *
     * @param \API\Entity\OAuthClient $client
     * @return OAuthAuthorizationCode
     */
    public function setClient(\API\Entity\OAuthClient $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \API\Entity\OAuthClient
     */
    public function getClient()
    {
        return $this->client;
    }


    /**
     * @param OAuthUser|null $user
     * @return $this
     */
    public function setUser(\API\Entity\OAuthUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \API\Entity\OAuthUser
     */
    public function getUser()
    {
        return $this->user;
    }

    public function toArray()
    {
        return [
            'code' => $this->code,
            'client_id' => $this->client_id,
            'user_id' => $this->user_id,
            'expires' => $this->expires,
            'scope' => $this->scope,
        ];
    }

    public static function fromArray($params)
    {
        $code = new self();
        foreach ($params as $property => $value) {
            $code->$property = $value;
        }
        return $code;
    }
}