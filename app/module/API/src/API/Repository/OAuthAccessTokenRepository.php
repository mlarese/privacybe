<?php
namespace API\Repository;

use Doctrine\ORM\EntityRepository;
use API\Entity\OAuthAccessToken;
use OAuth2\Storage\AccessTokenInterface;

class OAuthAccessTokenRepository extends EntityRepository implements AccessTokenInterface
{
    public function getAccessToken($oauthToken)
    {
        $token = $this->findOneBy(['token' => $oauthToken]);
        if ($token) {
            $token = $token->toArray();
            $token['expires'] = $token['expires']->getTimestamp();
        }
        return $token;
    }

    public function setAccessToken($oauthToken, $clientIdentifier, $userEmail, $expires, $scope = null)
    {
        $client = $this->_em->getRepository('API\Entity\OAuthClient')
            ->findOneBy(['client_id' => $clientIdentifier]);
        $user = $this->_em->getRepository('API\Entity\OAuthUser')
            ->findOneBy(['email' => $userEmail]);
        $token = OAuthAccessToken::fromArray([
            'token'     => $oauthToken,
            'client'    => $client,
            'user'      => $user,
            'expires'   => (new \DateTime())->setTimestamp($expires),
            'scope'     => $scope,
        ]);
        $this->_em->persist($token);
        $this->_em->flush();
    }
}
