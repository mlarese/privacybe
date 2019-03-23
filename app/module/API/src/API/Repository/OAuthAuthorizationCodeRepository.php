<?php
namespace API\Repository;

use Doctrine\ORM\EntityRepository;
use API\Entity\OAuthAuthorizationCode;
use OAuth2\Storage\AuthorizationCodeInterface;

class OAuthAuthorizationCodeRepository extends EntityRepository implements AuthorizationCodeInterface
{
    public function getAuthorizationCode($code)
    {
        $authCode = $this->findOneBy(['code' => $code]);
        if ($authCode) {
            $authCode = $authCode->toArray();
            $authCode['expires'] = $authCode['expires']->getTimestamp();
        }
        return $authCode;
    }

    public function setAuthorizationCode($code, $clientIdentifier, $userEmail, $redirectUri, $expires, $scope = null)
    {
        $client = $this->_em->getRepository('API\Entity\OAuthClient')
            ->findOneBy(array('client_id' => $clientIdentifier));
        $user = $this->_em->getRepository('API\Entity\OAuthUser')
            ->findOneBy(['email' => $userEmail]);
        $authCode = OAuthAuthorizationCode::fromArray([
            'code'           => $code,
            'client'         => $client,
            'user'           => $user,
            'redirect_uri'   => $redirectUri,
            'expires'        => (new \DateTime())->setTimestamp($expires),
            'scope'          => $scope,
        ]);
        $this->_em->persist($authCode);
        $this->_em->flush();
    }

    public function expireAuthorizationCode($code)
    {
        $authCode = $this->findOneBy(['code' => $code]);
        $this->_em->remove($authCode);
        $this->_em->flush();
    }
}
