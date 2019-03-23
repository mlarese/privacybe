<?php

namespace API\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * OAuthClient
 *
 * @ORM\Entity
 * @ORM\Table(name="oauth_clients")
 * @ORM\Entity(repositoryClass="API\Repository\OAuthClientRepository")
 */
class OAuthClient
{
    use EncryptableFieldEntity;




    /**
     * @var string
     *  @ORM\Id
     * @ORM\Column(name="client_id", type="string", nullable=false)
     */
    private $client_id;

    /**
     * @var string
     */
    private $client_secret;

    /**
     * @var string
     */
    private $redirect_uri = '';

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->client_id;
    }

    /**
     * Set client_identifier
     *
     * @param string $clientIdentifier
     * @return OAuthClient
     */
    public function setClientIdentifier($clientIdentifier)
    {
        $this->client_id = $clientIdentifier;
        return $this;
    }

    /**
     * Get client_identifier
     *
     * @return string
     */
    public function getClientIdentifier()
    {
        return $this->client_id;
    }

    /**
     * Set client_secret
     *
     * @param string $clientSecret
     * @return OAuthClient
     */
    public function setClientSecret($clientSecret)
    {
        $this->client_secret = $this->encryptField($clientSecret);
        return $this;
    }

    /**
     * Get client_secret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }

    /**
     * Verify client's secret
     *
     * @param string $password
     * @return Boolean
     */
    public function verifyClientSecret($clientSecret)
    {
        return $this->verifyEncryptedFieldValue($this->getClientSecret(), $clientSecret);
    }

    /**
     * Set redirect_uri
     *
     * @param string $redirectUri
     * @return OAuthClient
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

    public function toArray()
    {
        return [
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'redirect_uri' => $this->redirect_uri,
        ];
    }
}