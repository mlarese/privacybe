<?php

namespace App\Batch;


use App\Action\Emails\EmailHelpers;
use App\Action\Emails\PlainTemplateBuilder;
use App\DoctrineEncrypt\Encryptors\EncryptorInterface;
use App\Entity\Privacy\PrivacyDeferred;
use App\Entity\Proxy\PrivacyDeferredProxy;
use App\Env\Env;
use App\Resource\DeferredPrivacyResource;
use App\Resource\EmailResource;
use App\Resource\OwnerResource;
use App\Resource\UserResource;
use App\Service\DeferredPrivacyService;
use App\Traits\Environment;
use Exception;
use Interop\Container\Exception\ContainerException;
use function print_r;

class DeferredPrivacyBatch extends AbstractBatch {
    private $emailSender;
    use Environment;
    use EmailHelpers;
    /**
     * DeferredPrivacyBatch constructor.
     *
     * @param EntityManagerBuilder $emBuilder
     * @param                      $container
     * @param EmailSender          $emailSender
     * @param string               $env
     */
    public function __construct(EntityManagerBuilder $emBuilder, $container, EmailSender $emailSender, $env=Env::ENV_PROD)
    {
        parent::__construct($emBuilder, $container);


        $this->env = $env;
        $this->emailSender = $emailSender;
    }

    /**
     * @param string $deferredTYPE
     *
     * @throws Exception
     */
    public function sendDeferredEmails($deferredTYPE = DeferredPrivacyService::DEFERRED_TYPE_DOUBLE_OPTIN){

        try {
            $env = $this->detectEnvironment();
            $emcfg = $this->emBuilder->buildEmConfig();
            $ownres = new OwnerResource($emcfg);
            /** @var DeferredPrivacyService $srv */
            $srv = $this->container->get('deferred_privacy_service');
            /**
             * $emcfg solo per inizializzare
             */
            $defpres = new DeferredPrivacyResource($emcfg, $srv);
            $deferredSettings = $this->getContainer()->get('settings');
            $deferredSettings = $deferredSettings['dataone_emails'];

            $confirmLink = $deferredSettings[$deferredTYPE][$env]['confirm_link'];
            $aEmailSubject = $deferredSettings[$deferredTYPE]['all']['dictionary']['email_subject'];


            $owns = $ownres->geOwnersFW();
            /** @var PlainTemplateBuilder $tpbuilder */

            $tpbuilder = $this->container->get('dbl_optin_template_builder');

            /** @var EncryptorInterface $enc */
            $encryptor = $this->getContainer()->get('encryptor');



        } catch (ContainerException $e) {
            echo $e->getMessage();
            print_r($this->getContainer());
            throw new Exception('unable to start batch');
        }

        foreach ($owns as $own) {

            if($this->getEnv() === Env::ENV_DEV) {
                // solo struttura demo
                // if($own->getId()!=34) continue;
            }

            try {
                $emprv = $this->emBuilder->buildSUPrivateEM($own->getId());
                $emailResource = new EmailResource($emprv, $emcfg);
                $defpres->setEntityManager($emprv);

                $qb = $emprv->createQueryBuilder();
                /** @var PrivacyDeferredProxy[] $privs */
                $privs = $defpres->retrieveOpened();

                $q = $qb->update(PrivacyDeferred::class,'p')
                    ->set('p.status', DeferredPrivacyService::DEFERRED_STATUS_ELABORATED)
                    ->where('p.id = ?1');



                foreach ($privs as $priv) {
                    $encOwnerId =  urlencode( base64_encode( $encryptor->encrypt($own->getId()) ) );
                    $encPprivacyUid = urlencode( base64_encode( $encryptor->encrypt($priv->getId()) ) );

                    $_lang = 'en';
                    $emailSubject = $aEmailSubject[$_lang] ;
                    if(isset($aEmailSubject[$priv->getLanguage()])) {
                        $_lang = $priv->getLanguage();
                        $emailSubject = $aEmailSubject[$priv->getLanguage()] ;
                    }


                    // echo '-----------'.$emailSubject;
                    try {
                        $data = $emailResource->composePrivaciesData(
                            $_lang,
                            $priv->getEmail(),
                            $own->getId(),
                            $priv->getDomain(),
                            $priv->getId()
                        );

                        $data[ 'enclink'] ="$confirmLink?_j=$encPprivacyUid&_k=$encOwnerId&lang=$_lang";

                        $this->sendGenericEmail(
                            $this->getContainer(),
                            $data,
                            'double_optin',
                            $_lang,
                            $own->getEmail(),
                            $priv->getEmail()
                        );


                        $q->setParameter(1, $priv->getId())
                            ->getQuery()
                            ->execute();
                    } catch (Exception $e) {
                        echo ' error ' . $e->getMessage();
                    }
                }

            } catch (Exception $e) {
                echo $e->getMessage().', ';
            }


        }

    }

}
