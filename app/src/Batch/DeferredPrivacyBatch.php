<?php

namespace App\Batch;


use App\Action\Emails\PlainTemplateBuilder;
use App\Entity\Privacy\PrivacyDeferred;
use App\Entity\Proxy\PrivacyDeferredProxy;
use App\Resource\DeferredPrivacyResource;
use App\Resource\OwnerResource;
use App\Resource\UserResource;
use App\Service\DeferredPrivacyService;
use Exception;
use function print_r;

class DeferredPrivacyBatch extends AbstractBatch {
    private $emailSender;

    /**
     * DeferredPrivacyBatch constructor.
     * @param $emailSender
     */
    public function __construct(EntityManagerBuilder $emBuilder, $container, EmailSender $emailSender)
    {
        parent::__construct($emBuilder, $container);

        $this->emailSender = $emailSender;
    }

    /**
     * @param string $deferredTYPE
     *
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function sendDeferredEmails($deferredTYPE = DeferredPrivacyService::DEFERRED_TYPE_DOUBLE_OPTIN){
        $emcfg = $this->emBuilder->buildEmConfig();

        $ownres = new OwnerResource($emcfg);

        /** @var DeferredPrivacyService $srv */
        $srv = $this->container->get('deferred_privacy_service');
        /**
         * $emcfg solo per inizializzare
         */
        $defpres = new DeferredPrivacyResource($emcfg, $srv);

        $owns = $ownres->geOwnersFW();
        /** @var PlainTemplateBuilder $tpbuilder */
        $tpbuilder = $this->container->get('dbl_optin_template_builder');

        foreach ($owns as $own) {

            if($own->getId()!=34) continue;

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
                    $data=['enclink'=>"hhhhddd"];
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
