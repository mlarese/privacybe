<?php
namespace App\Action;

use App\Entity\Config\Domain;
use App\Entity\Config\Page;
use App\Entity\Config\Properties;
use App\Entity\Privacy\Privacy;
use App\Entity\Privacy\Term;
use App\Entity\Privacy\TermPage;
use App\Resource\OwnerExistException;
use App\Resource\PrivacyNotFoundException;
use App\Resource\PrivacyResource;
use App\Resource\PropertiesResource;
use App\Resource\PropertyNotFoundException;
use App\Resource\TermPageResource;
use App\Resource\TermResource;
use function base64_encode;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use Exception;
use function json_decode;
use function json_encode;
use function print_r;
use Slim\Http\Request;
use Slim\Http\Response;
use function substr;

class PrivacyManager extends AbstractAction
{

    /**
     * @return string
     */
    private function getIp () {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * @param $hash
     *
     * @return int
     * @throws OwnerExistException
     */
    private function findOwnerIdFromHash($hash) {
        $ownerId = 0;
        for($i=0;$i<900000;$i++) {
            $m = md5($i);
            if($hash === $m) {
                $ownerId = $i;
                break;
            }
        }

        if($ownerId === 0) {
            throw new OwnerExistException('Owner not found');
        }

        return $ownerId;
    }
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function searchPrivacy($request, $response, $args) {
        $ownerId = $this->getOwnerId($request);
        $em = $this->getEmPrivacy($ownerId);
        $pres = new PrivacyResource($em);
    }
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getPrivacy($request, $response, $args) {
        $id = $args['id'];
        $uid = substr($id,0, 36);
        $ownerHash = substr($id,37, strlen ($id));

        try {
            $ownerId = $this->findOwnerIdFromHash($ownerHash);
        } catch (OwnerExistException $e) {
            return $response->withStatus(500,$e->getMessage());
        }
        $em = $this->getEmPrivacy($ownerId);
        $pres = new PrivacyResource($em);

        try {
            /** @var Privacy $p */
            $p = $pres->getPrivacy($uid);

            $cForm = $p->getCryptedForm();
            $cForm = json_decode($cForm, true);

            $p->setCryptedForm($cForm);
        } catch (PrivacyNotFoundException $e) {
            echo $e->getMessage();
            return $response->withStatus(500,'PrivacyNotFoundException');
        } catch (OptimisticLockException $e) {
            echo $e->getMessage();
            return $response->withStatus(500,'OptimisticLockException');
        } catch (TransactionRequiredException $e) {
            echo $e->getMessage();
            return $response->withStatus(500,'TransactionRequiredException');
        } catch (ORMException $e) {
            echo $e->getMessage();
            $response->withStatus(500,'ORMException');
        }catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500,'Exception');
        }

        return $response->withJson( $this->toJson($p));
    }
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getWidgetTermById($request, $response, $args) {
        $id = $args['id'];
        $ownerId = $request->getHeader('OwnerId')[0];
        $em = $this->getEmPrivacy($ownerId);

        /** @var Privacy $pr */
        $pr = $em->find(Privacy::class,$id);
        $cr = $pr->getCryptedForm();
        echo  $cr ; die;
        print_r($pr);die;

    }
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getWidgetTerm($request, $response, $args) {
        $_k=$request->getParam('_k');
        $params=base64_decode(  urldecode($_k) );
        //$params = $request->getHeader('Domain')[0];
        $params = json_decode($params, true);

        $lang = $params['language'];
        $pageName = $params['page'];
        $domainName = $params['domain'];
        $ownerId = $params['ownerId'];
        $ref = $params['ref'];
        $termId = $params['termId'];
        $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;

        // die(" lang=$lang, pageName=$pageName, domainName=$domainName, ownerId=$ownerId, ref=$ref, termId=$termId");

        /** @var EntityManager $em */
        $cem = $this->getEmConfig();

        /** @var EntityManager $em */
        $em = $this->getEmPrivacy($ownerId);

        if($termId===''){
            $termRes = new TermResource($em);
            $termPgRes = new TermPageResource($em);
            // $pages = $termPgRes->findByPage($domainName, $pageName);

            /** @var TermPage $termPage  */
            $termPage = $em
                        ->getRepository(TermPage::class)
                        ->findOneBy(array('domain' => $domainName, 'page' => $pageName, 'deleted'=>0));

            If(!isset($termPage)) {
                return $response->withStatus(403, "Page $domainName$pageName not found (owner $ownerId)");
            }

            $termId = $termPage->getTermUid();
        }

        $propRes = new PropertiesResource($this->getEmConfig());
        /** @var Term $term */
        $term = null;

        try {
            $term = $em->find(Term::class, $termId);
            $scrollText = $propRes->widgetScrollText();
        } catch (PropertyNotFoundException $e) {
            echo $e->getMessage();
            return $response->withStatus(403, 'PropertyNotFoundException finding term');
        } catch (OptimisticLockException $e) {
            echo $e->getMessage();
            return $response->withStatus(403, 'OptimisticLockException finding term');
        } catch (TransactionRequiredException $e) {
            echo $e->getMessage();
            return $response->withStatus(403, 'TransactionRequiredException finding term');
        } catch (ORMException $e) {

            echo $e->getMessage().' '.$termId;
            return $response->withStatus(403, 'ORMException finding term with termids');
        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(403, 'Exception finding term');
        }


        If(!isset($term)) {
            return $response->withStatus(403, "Term not found [$termId]");
        }
        $paragraphs = $term->getParagraphs();
        $termResponse = array();

        foreach($paragraphs as $p) {
            if(!isset($p['text'][$lang])) {
                $lang = 'en';
                if(!isset($p['text'][$lang])) {
                    $lang = 'it';
                }
            }

            $title = "";
            if(isset($p['title'][$lang])) {
                $title = $p['title'][$lang];
            }

            $newP = array(
              "text" => $p['text'][$lang],
              "treatments" => array(),
              "scrolled" => false,
              "title" => $title,
              "scrollText" => $scrollText[$lang]
            );

            foreach($p['treatments'] as $t) {
                $newT = array(
                   "code" => $t['name'],
                   "restrictive" => $t['restrictive'],
                   "mandatory" => $t['mandatory'],
                   "text" => $t['text'][$lang],
                   "selected" => false
                );

                $newP['treatments'][] = $newT;
            }
            $termResponse[] = $newP;
        }

        $js = $this->toJson($termResponse);
        $this->addP3P($response);

        return $response->withJson(
            array(
                "referrer" => $httpReferer,
                "ownerId" => $ownerId,
                "termId" => $termId,
                "name" => $term->getName(),
                "paragraphs" => $js
            )
        );
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     *
     * @return mixed
     */
    public function savePrivacy($request, $response, $args) {
        $ownerId = $request->getHeader('OwnerId')[0];
        $body = $request->getParsedBody();

        try {
            $ip = $this->getIp();
            $domain = $body['domain'];
            $id = $body['id'];
            $email = $body['record']['email'];
            $name = $body['record']['name'];
            $surname = $body['record']['surname'];
            $telephone = $body['record']['telephone'];
            $site = $body['page'];

            if(isset($termId)) {
                $termId = $body['termId'];
            } else {
                // nessuna normativa associata
                $termId = 0 ;
            }

            $privacyFlags = $body['flags'];
            $privacy = $body['term'];
            $form = $body['form'];
            $cryptedForm = $body['cryptedForm'];
            $cryptedForm = json_encode($cryptedForm);// print_r($privacy); die;
            $ref = $body['ref'];
            if (!isset($ref)) {
                $ref = '';
            }
            /**
             * @var EntityManager $em
             */
            $em = $this->getEmPrivacy($ownerId);
            $prRes = new PrivacyResource($em);

            $pr=$prRes->savePrivacy(
                $ip,
                $form,
                $cryptedForm,
                $name,
                $surname,
                $termId,
                $site,
                $privacy,
                $id,
                $ref,
                $domain,
                $email,
                $privacyFlags,
                $telephone
            );

            $jsonPrivacy = $this->toJson($pr);
            $jsonPrivacy = json_encode($jsonPrivacy);
            $ph = $prRes->savePrivacyLog($id, $jsonPrivacy, 'save from website');

        } catch (ORMException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Orm Exception saving privacy');
        } catch (Exception $e) {
            return $response->withStatus(500, 'Exception saving privacy');
        }


        return $response->withJson($this->success()) ;
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     *
     * @return mixed
     */
    public function updatePrivacy($request, $response, $args) {
        $ownerId = $request->getHeader('OwnerId')[0];
        $body = $request->getParsedBody();
        $id = $args['id'] ;

        try {
            $email = $body['record']['email'];
            $name = $body['record']['name'];
            $surname = $body['record']['surname'];
            $telephone = $body['record']['telephone'];

            $privacyFlags = $body['flags'];
            $privacy = $body['term'];
            $form = $body['form'];
            $cryptedForm = $body['cryptedForm'];
            $cryptedForm = json_encode($cryptedForm);// print_r($privacy); die;

            /**
             * @var EntityManager $em
             */
            $em = $this->getEmPrivacy($ownerId);
            $prRes = new PrivacyResource($em);

            try {
                $pr = $prRes->updatePrivacy(
                    $id,
                    $form,
                    $cryptedForm,
                    $name,
                    $surname,
                    $privacy,
                    $email,
                    $privacyFlags,
                    $telephone
                );
                $jsonPrivacy = $this->toJson($pr);
                $jsonPrivacy = json_encode($jsonPrivacy);
                $prRes->savePrivacyLog($id,$jsonPrivacy, 'privacy update');
            } catch (PrivacyNotFoundException $e) {
                echo $e->getMessage();
                return $response->withStatus(500, 'Privacy Not Found Exception  saving privacy');
            } catch (OptimisticLockException $e) {
                echo $e->getMessage();
                return $response->withStatus(500, 'OptimisticLockExceptionsaving privacy');
            } catch (TransactionRequiredException $e) {
                echo $e->getMessage();
                return $response->withStatus(500, 'TransactionRequiredException privacy');
            } catch (ORMException $e) {
                echo $e->getMessage();
                return $response->withStatus(500, 'ORMException privacy');
            }

        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception saving privacy');
        }


        return $response->withJson($this->success()) ;

    }

}
