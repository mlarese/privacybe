<?php
namespace App\Action;

use App\Entity\Config\Domain;
use App\Entity\Config\Page;
use App\Entity\Config\Properties;
use App\Entity\Privacy\Privacy;
use App\Entity\Privacy\Term;
use App\Entity\Privacy\TermPage;
use App\Resource\PropertiesResource;
use App\Resource\PropertyNotFoundException;
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

class PrivacyManager extends AbstractAction
{

    /**
     * @return string
     */
    private function getIp () {
        return $_SERVER['REMOTE_ADDR'];
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
        $lang = $request->getHeader('Language')[0];
        $pageName = $request->getHeader('Page')[0];
        $domainName = $request->getHeader('Domain')[0];
        $ownerId = $request->getHeader('OwnerId')[0];
        $ref = $request->getHeader('Ref')[0];
        $termId = $request->getHeader('TermId')[0];


        // die(" lang=$lang, pageName=$pageName, domainName=$domainName, ownerId=$ownerId, ref=$ref, termId=$termId");

        /** @var EntityManager $em */
        $cem = $this->getEmConfig();

        /** @var EntityManager $em */
        $em = $this->getEmPrivacy($ownerId);

        if($termId===''){
            /** @var TermPage $termPage  */
            $termPage = $em
                        ->getRepository(TermPage::class)
                        ->findOneBy(array('domain' => $domainName, 'page' => $pageName));

            If(!isset($termPage)) {
                return $response->withStatus(403, "Page $domainName$pageName not found (owner $ownerId)");
            }

            $termId = $termPage->getTermUid();
        }

        $propRes = new PropertiesResource($this->getEmConfig());
        /** @var Terms $term */
        $term = null;

        try {
            $term = $em->find(Term::class, $termId);
            $scrollText = $propRes->widgetScrollText();
        } catch (PropertyNotFoundException $e) {
            die($ownerId . ' e '.$e->getMessage());
            return $response->withStatus(403, 'PropertyNotFoundException finding term');
        } catch (OptimisticLockException $e) {
            die($ownerId . ' e '.$e->getMessage());
            return $response->withStatus(403, 'OptimisticLockException finding term');
        } catch (TransactionRequiredException $e) {
            die($ownerId . ' e '.$e->getMessage());
            return $response->withStatus(403, 'TransactionRequiredException finding term');
        } catch (ORMException $e) {
            die($ownerId . ' e '.$e->getMessage());
            return $response->withStatus(403, 'ORMException finding term');
        } catch (Exception $e) {
            die($ownerId . ' e '.$e->getMessage());
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


            $newP = array(
              "text" => $p['text'][$lang],
              "treatments" => array(),
              "scrolled" => false,
              "title" => $p['title'][$lang],
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

        return $response->withJson(
            array(
                "ownerId" => $ownerId,
                "termId" => $termId,
                "paragraphs" => $js
            )
        );
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
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
            $termId = $body['termId'];
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
            $privacyEntry = new Privacy();
            $privacyEntry
                ->setCreated(new DateTime())
                ->setDeleted(false)
                ->setIp($ip)
                ->setForm($form)
                ->setCryptedForm($cryptedForm)
                ->setName($name)
                ->setSurname($surname)
                ->setTermId($termId)
                ->setSite($site)
                ->setPrivacy($privacy)
                ->setId($id)//
                ->setRef($ref)//
                ->setDomain($domain)
                ->setEmail($email)
                ->setPrivacyFlags($privacyFlags)
                ->setTelephone($telephone);
        } catch (ORMException $e) {
            return $response->withStatus(500, 'Orm Exception saving privacy');
        } catch (Exception $e) {
            return $response->withStatus(500, 'Exception saving privacy');
        }

        try{
            $em->merge($privacyEntry);
            $em->flush();
        } catch (Exception $e) {
            return $response->withStatus(500, 'Orm Exception on merge privacy');
        }

        return $response->withJson($this->success()) ;
    }


}
