<?php
namespace API\Repository;

use Doctrine\ORM\EntityRepository;
use YourNamespace\Entity\OAuthRefreshToken;
use OAuth2\Storage\RefreshTokenInterface;

class OAuthRefreshTokenRepository extends EntityRepository implements RefreshTokenInterface
{
    public function getRefreshToken($refreshToken)
    {
        $refreshToken = $this->findOneBy(['refresh_token' => $refreshToken]);
        if ($refreshToken) {
            $refreshToken = $refreshToken->toArray();
            $refreshToken['expires'] = $refreshToken['expires']->getTimestamp();
        }
        return $refreshToken;
    }

    public function setRefreshToken($refreshToken, $clientIdentifier, $userEmail, $expires, $scope = null)
    {
        $client = $this->_em->getRepository('YourNamespace\Entity\OAuthClient')
            ->findOneBy(['client_identifier' => $clientIdentifier]);
        $user = $this->_em->getRepository('YourNamespace\Entity\OAuthUser')
            ->findOneBy(['email' => $userEmail]);
        $refreshToken = OAuthRefreshToken::fromArray([
            'refresh_token'  => $refreshToken,
            'client'         => $client,
            'user'           => $user,
            'expires'        => (new \DateTime())->setTimestamp($expires),
            'scope'          => $scope,
        ]);
        $this->_em->persist($refreshToken);
        $this->_em->flush();
    }

    public function unsetRefreshToken($refreshToken)
    {
        $refreshToken = $this->findOneBy(['refresh_token' => $refreshToken]);
        $this->_em->remove($refreshToken);
        $this->_em->flush();
    }
}