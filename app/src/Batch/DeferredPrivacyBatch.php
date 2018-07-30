<?php

namespace App\Batch;


use App\Action\Emails\PlainTemplateBuilder;
use App\DoctrineEncrypt\Encryptors\EncryptorInterface;
use App\Entity\Privacy\PrivacyDeferred;
use App\Entity\Proxy\PrivacyDeferredProxy;
use App\Env\Env;
use App\Resource\DeferredPrivacyResource;
use App\Resource\OwnerResource;
use App\Resource\UserResource;
use App\Service\DeferredPrivacyService;
use Exception;
use Interop\Container\Exception\ContainerException;
use function print_r;

class DeferredPrivacyBatch extends AbstractBatch {
    private $emailSender;
    private $env;

    /**
     * @return string
     */
    public function getEnv(): string {
        return $this->env;
    }

    /**
     * @param string $env
     */
    public function setEnv(string $env): void {
        $this->env = $env;
    }

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
            $emcfg = $this->emBuilder->buildEmConfig();
            $ownres = new OwnerResource($emcfg);
            /** @var DeferredPrivacyService $srv */
            $srv = $this->container->get('deferred_privacy_service');
            /**
             * $emcfg solo per inizializzare
             */
            $defpres = new DeferredPrivacyResource($emcfg, $srv);
            $deferredSettings = $this->getContainer()->get('settings');
            $confirmLink = $deferredSettings[$this->getEnv()]['confirm_link'];

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
                if($own->getId()!=34) continue;
            }

            try {
                $emprv = $this->emBuilder->buildSUPrivateEM($own->getId());
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

                    $data=[
                        'enclink'=>"$confirmLink?_j$encPprivacyUid&_k=$encOwnerId",
                        'name'=>$priv->getName(),
                        'surname'=>$priv->getSurname()
                    ];
                    $body = $tpbuilder->render($data,$priv->getLanguage());
                    try {
                        $this->emailSender->sendEmail(
                            $own->getEmail(),
                            $priv->getEmail(),
                            $deferredTYPE,
                            'doptin'
                        );

                        $q->setParameter(1, $priv->getId())
                            ->getQuery()
                            ->execute();
                    } catch (Exception $e) { }
                }

            } catch (Exception $e) {
                echo $e->getMessage().', ';
            }


        }

    }

}
