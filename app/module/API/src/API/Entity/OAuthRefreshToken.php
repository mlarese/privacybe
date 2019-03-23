<?php
namespace API\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * OAuthRefreshToken
 *
 * @ORM\Entity
 * @ORM\Table(name="oauth_refresh_tokens")
 * @ORM\Entity(repositoryClass="API\Repository\OAuthRefreshTokenRepository")
 */
class OAuthRefreshToken
{
    /**
     * @ORM\Id
     * @ORM\Column(name="refresh_token", type="string", nullable=false)
     **/
    private $id;

    /**
     * @var string
     */
    private $refresh_token;

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
     * Set refresh_token
     *
     * @param string $refresh_token
     * @return OAuthRefreshToken
     */
    public function setRefreshToken($refresh_token)
    {
        $this->refresh_token = $refresh_token;

        return $this;
    }

    /**
     * Get refresh_token
     *
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refresh_token;
    }

    /**
     * Set client_id
     *
     * @param string $clientId
     * @return OAuthRefreshToken
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
     * @return OAuthRefreshToken
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
     * @return OAuthRefreshToken
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
     * @return OAuthRefreshToken
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
     * @return OAuthRefreshToken
     */
    public function setClient(\API\Entity\OAuthClient $client = null)
    {
        $this->client = $client;

        return $this;
    }


    /**
     * @return OAuthClient
     */
    public function getClient()
    {
        return $this->client;
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
        return $this->user;
    }

    public function toArray()
    {
        return [
            'refresh_token' => $this->refresh_token,
            'client_id' => $this->client_id,
            'user_id' => $this->user_id,
            'expires' => $this->expires,
            'scope' => $this->scope,
        ];
    }

    public static function fromArray($params)
    {
        $token = new self();
        foreach ($params as $property => $value) {
            $token->$property = $value;
        }
        return $token;
    }
}