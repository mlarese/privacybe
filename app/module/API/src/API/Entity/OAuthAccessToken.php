<?php

namespace API\Entity;
use Doctrine\ORM\Mapping as ORM;
use OAuth2\Storage\AccessTokenInterface;

/**
 * OAuthAccessToken
 * @ORM\Entity
 * @ORM\Table(name="oauth_access_tokens")
 * @ORM\Entity(repositoryClass="API\Repository\OAuthAccessTokenRepository")
 *
 */
class OAuthAccessToken
{
    /**
     * @ORM\Id
     * @ORM\Column(name="access_token", type="string", nullable=false)
     **/
    private $id;

    /**
     * @var string
     */
    private $token;

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
     * Set token
     *
     * @param string $token
     * @return OAuthAccessToken
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set client_id
     *
     * @param string $clientId
     * @return OAuthAccessToken
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
     * @return OAuthAccessToken
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
     * @return OAuthAccessToken
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
     * Set scope
     *
     * @param string $scope
     * @return OAuthAccessToken
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
     * @return OAuthAccessToken
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

    public static function fromArray($params)
    {
        $token = new self();
        foreach ($params as $property => $value) {
            $token->$property = $value;
        }
        return $token;
    }

    /**
     * Set user
     *
     * @param \API\Entity\OAuthUser $user
     * @return OAuthRefreshToken
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
        return $this->client;
    }

    public function toArray()
    {
        return [
            'token' => $this->token,
            'client_id' => $this->client_id,
            'user_id' => $this->user_id,
            'expires' => $this->expires,
            'scope' => $this->scope,
        ];
    }
}