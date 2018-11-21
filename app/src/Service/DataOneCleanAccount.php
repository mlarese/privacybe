<?php

namespace App\Service;


use App\Entity\Privacy\Privacy;
use App\Helpers\PrivacyHelper;
use Doctrine\ORM\EntityManager;

class DataOneCleanAccount
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em = null;

    public function removeAccount($ownerId, $termId)
    {
        /**
         * @var $em EntityManager
         */
        $settings = require realpath(__DIR__.'/../../settings.php');
        $privacyHelper = new PrivacyHelper();
        $em = $privacyHelper->getPrivacyDb($settings['settings'], $ownerId);

        $userWithNoConsentStatement = $em->getRepository('App\Entity\Privacy\Privacy')->findByTermId($termId);
        $i = 0;
        $notRemoved = array();
        if(!empty($userWithNoConsentStatement))
        {
            $userToRemove = array();
            foreach ($userWithNoConsentStatement as $user)
            {
                /**
                 * @var $user Privacy
                 */
                $userByEmail = $em->getRepository('App\Entity\Privacy\Privacy')->findByEmail($user->getEmail());
                if(count($userByEmail) > 1)
                {
                    $userToRemove[] = $user;
                }
            }

            if(!empty($userToRemove))
            {
                $flushed = 0;
                foreach ($userToRemove as $val)
                {
                    try {
                        $em->remove($val);
                        echo '.';
                        $i++;
                    } catch (\Exception $e) {
                        echo "/".$e->getMessage()."/";
                        $notRemoved[] = $val->getId();
                    }

                    if($i % 50 == 0)
                    {
                        $em->flush();
                        echo '!';
                        $flushed = $flushed + 50;
                    }
                }

                // Verifico se sono avanzati record su cui fare il flush
                if(intval(count($userToRemove) - $flushed) > 0)
                {
                    $em->flush();
                }
            }
        }

        echo " --- Account deleted: ".$i." --- ";
        if(!empty($notRemoved))
        {
            echo ' *** Account not deleted: '.count($notRemoved).'. Id accounts: '.implode(' - ', $notRemoved).' *** ';
        }
    }
}