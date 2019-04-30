<?php

namespace App\Batch;


use App\Action\Emails\EmailHelpers;
use App\Action\Emails\PlainTemplateBuilder;
use App\DoctrineEncrypt\Encryptors\EncryptorInterface;
use App\Entity\Privacy\Configuration;
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
use function tmpfile;

class DeferredPrivacyBatch extends AbstractBatch {
    private $emailSender;
    private $debug=false;

    /**
     * @return bool
     */
    public function isDebug() {
        return $this->debug;
    }

    /**
     * @param bool $debug
     */
    public function setDebug(bool $debug) {
        $this->debug = $debug;
    }
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
            $env = 'prod';
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

            if($this->isDebug()) if($own->getId()!=34) continue;

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


                // recupero email template
                /** @var Configuration $emailtplRec */
                $emailtplRec=null;
                $emailtplRec = $emprv->find(Configuration::class, 'dbloptin-email-template');

                $hasEmailTemplate = isset($emailtplRec);
                $emailtplByDomain = [];
                $emailtpl=[];

                if($hasEmailTemplate) {
                    if($this->isDebug()) echo '\n-- found template';
                    $emailtpl = $emailtplRec->getData();

                    foreach ($emailtpl as $key=>$tpl) {
                        $tplDomain = $tpl['domain'];
                        if(!isset($tplDomain) || $tplDomain==='') $tplDomain='default';
                        $emailtplByDomain[ $tplDomain ] = $tpl;
                    }

                }


                /** @var PrivacyDeferredProxy $priv */
                foreach ($privs as $priv) {
                    $email = $priv->getEmail();
                    if(!isset($email) or $email==='') continue;

                    $_lang = 'en';
                    $emailSubject = $aEmailSubject[$_lang] ;
                    if(isset($aEmailSubject[$priv->getLanguage()])) {
                        $_lang = $priv->getLanguage();
                        $emailSubject = $aEmailSubject[$priv->getLanguage()] ;
                    }

                    /***********************************/
                    /*****   EMAIL TEMPLATE ONLY  ******/
                    $tplSubject=$emailSubject;
                    $tplStructure='';
                    $tplLogo='https://reservation.cmsone.it/backend/images/insurance_letter.png';
                    $tplHtml='';

                    if($this->isDebug()) echo("\n-- $email = $email ");

                    if($hasEmailTemplate) {
                        $domain = $priv->getDomain();
                        $lng = $priv->getLanguage();
                        if(isset($emailtplByDomain[$domain])) {
                            $currentTpl = $emailtplByDomain[$domain];
                        } else {
                            $currentTpl = $emailtplByDomain['default'];
                            if($this->isDebug()) echo("\n-- default template");
                        }

                        if($this->isDebug()) echo("\n-- domain = $domain  language=$lng");

                        if(isset($currentTpl['structure'])) $tplStructure = $currentTpl['structure'];
                        if(isset($currentTpl['logo'])) $tplLogo = $currentTpl['logo'];

                        $tmpLang = 'en';
                        if(isset($currentTpl['text'][$lng])) $tmpLang = $lng;
                            if(isset($currentTpl['subject'][$lng])) $tplSubject = $currentTpl['subject'][$tmpLang];
                            $tplHtml = $currentTpl['text'][$tmpLang];

                            if($this->isDebug()) echo("\n-- template language = $tmpLang");

                    }

                    /*****   EMAIL TEMPLATE ONLY  ******/
                    /***********************************/

                    $encOwnerId =  urlencode( base64_encode( $encryptor->encrypt($own->getId()) ) );
                    $encPprivacyUid = urlencode( base64_encode( $encryptor->encrypt($priv->getId()) ) );

                    try {
                        $data = $emailResource->composePrivaciesData(
                            $_lang,
                            $priv->getEmail(),
                            $own->getId(),
                            $priv->getDomain(),
                            $priv->getId()
                        );

                        $data['name'] = $priv->getName();
                        $data['surname'] = $priv->getSurname();
                        $data[ 'enclink'] ="$confirmLink?_j=$encPprivacyUid&_k=$encOwnerId&lang=$_lang";
                        $data[ 'structure'] = $tplStructure;
                        $data[ 'logo'] = $tplLogo;

                        if($hasEmailTemplate) {
                            if($this->isDebug()) echo("\n-- sendGenericEmailHtml ") ;

                            $this->sendGenericEmailHtml(
                                $this->getContainer(),
                                $data,
                                'double_optin',
                                $_lang,
                                $own->getEmail(),
                                $priv->getEmail(),
                                'dataone_emails',
                                $tplSubject,
                                $tplHtml
                            );
                        }else {
                        $this->sendGenericEmail(
                            $this->getContainer(),
                            $data,
                            'double_optin',
                            $_lang,
                            $own->getEmail(),
                                $priv->getEmail());
                        }

                        $q->setParameter(1, $priv->getId()) ->getQuery() ->execute();
                        $emprv->flush();


                    } catch (Exception $e) {
                        echo ' error ' . $e->getMessage();
                    }
                }

            } catch (Exception $e) {
                echo $e->getMessage();
            }


        }

    }

}
