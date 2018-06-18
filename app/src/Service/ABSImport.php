<?php

namespace App\Service;

use App\Entity\Privacy\Privacy as PrivacyEntity;

class ABSImport {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em = null;

    public function importEnquiry (
        $ownerId,
        $termId,
        $enquiryUrl,
        $file
    ) {

        // Expected CSV header
        $expectedHeader = json_decode('{"Data":0,"Structure Id":1,"Struttura":2,"Portale":3,"Ospite":4,"Data di checkin":5,"Checkout date":6,"Adulti":7,"E-mail":8,"Newsletter":9,"Lingua":10,"Nazione":11,"Privacy Term":12,"Newsletter Language":13,"Citt\u00e0":14,"Portal Id":15}', true);

        // Read the CSV file
        $csv = $this->readCSVFile($file);

        // Check if import header was changed
        if (count(array_diff($expectedHeader, $csv->header)) !== 0) {
            throw new \Exception(sprintf(
                "Something was changed in CSV file header"
            ));
        }

        /** @var \App\Entity\Privacy\Term $term */
        $term = $this->getOwnerEntityManager($ownerId)
            ->getRepository('App\Entity\Privacy\Term')
            ->findOneByUid($termId);
        $termParagraphs = $term->getParagraphs();

        // Transform and insert data
        $now = new \DateTime('now');
        try {
            foreach ($csv->body as $row) {

                // Terms flags
                $privacyTerm = (bool)$row[$csv->header['Privacy Term']];
                $newsletterTerm = (bool)$row[$csv->header['Newsletter']];

                // Bypass no minimum requirements
                if (!$privacyTerm) {
                    // @todo creare un messaggio di warning nel file di log
                    continue;
                } else {
                    $privacyEntity = new PrivacyEntity();
                }

                // Set full enquiry URL
                $referer = sprintf(
                    "%s?%s",
                    $enquiryUrl,
                    $this->generateQueryString(
                        $row[$csv->header['Structure Id']],
                        new \DateTime($row[$csv->header['Data di checkin']]),
                        new \DateTime($row[$csv->header['Checkout date']]),
                        $row[$csv->header['Portal Id']]
                    )
                );

                // Set email
                $privacyEntity->setEmail(trim($row[$csv->header['E-mail']]));

                // Set no IP address in ABS Enquiry
                $privacyEntity->setIp('');

                // Set UID
                $privacyEntity->setId($this->generateUID(
                    $row[$csv->header['Data']],
                    trim($row[$csv->header['Portal Id']]),
                    trim($row[$csv->header['Structure Id']]),
                    $privacyEntity->getEmail()
                ));

                // Set reference
                $privacyEntity->setRef(sprintf(
                    "import-console-abs-enquiry-%s",
                    $now->format('YMDHi')
                ));

                // Set name
                $name = explode(' ', $row[$csv->header['Ospite']]);
                $privacyEntity->setName(trim($name[0]));
                unset($name);

                // Set surname
                $privacyEntity->setSurname(trim(str_replace($privacyEntity->getName(), '', $row[$csv->header['Ospite']])));

                // Set language
                $lang = trim($row[$csv->header['Lingua']]);

                // Set form
                $privacyEntity->setForm([
                    'id' => $privacyEntity->getId(),
                    'email' => trim($privacyEntity->getEmail()),
                    'title' => $row[$csv->header['Portale']],
                    'name' => $privacyEntity->getName(),
                    'surname' => $privacyEntity->getSurname(),
                    'phone' => [],
                    'mobile' => [],
                    'fax' => [],
                    'city' => trim($row[$csv->header['Città']]),
                    'language' => $lang,
                    'zipcode' => [],
                    'nation' => $row[$csv->header['Nazione']],
                    'birth date' => [],
                    'ip' => $privacyEntity->getIp(),
                    'iso2language' => $lang,
                    'subscribeurl' => $referer,
                    'privacy' => (isset($termParagraphs[0]['text'][$lang])) ? $termParagraphs[0]['text'][$lang] : $termParagraphs[0]['text']['en']
                ]);
                $privacyEntity->setCryptedForm(json_encode($privacyEntity->getForm()));

                // Set privacy
                $privacyEntity->setPrivacyFlags([
                    [
                        'code' => 'dati_personali',
                        'selected' => $privacyTerm,
                        'mandatory' => true,
                        'text' => (isset($termParagraphs[0]['treatments'][0]['text'][$lang])) ? $termParagraphs[0]['treatments'][0]['text'][$lang] : $termParagraphs[0]['treatments'][0]['text']['en']
                    ], [
                        'code' => 'newsletter',
                        'selected' => $newsletterTerm,
                        'mandatory' => false,
                        'text' => (isset($termParagraphs[0]['treatments'][1]['text'][$lang])) ? $termParagraphs[0]['treatments'][1]['text'][$lang] : $termParagraphs[0]['treatments'][1]['text']['en']
                    ]
                ]);
                $privacyEntity->setPrivacy([
                    "referrer" => $referer,
                    "ownerId" => $ownerId,
                    "termId" => $termId,
                    "language" => $lang,
                    "name" => $term->getName(),
                    "paragraphs" => [
                        [
                            "text" => (isset($termParagraphs[0]['text'][$lang])) ? $termParagraphs[0]['text'][$lang] : $termParagraphs[0]['text']['en'],
                            "title" => (isset($termParagraphs[0]['title'][$lang])) ? $termParagraphs[0]['title'][$lang] : $termParagraphs[0]['title']['en'],
                            "treatments" => $privacyEntity->getPrivacyFlags()
                        ]
                    ],
                ]);

                // Set term ID
                $privacyEntity->setTermId($termId);

                // Set domain & site
                $referer = parse_url($referer);
                isset($referer['host']) ? $privacyEntity->setDomain($referer['host']) : $privacyEntity->setDomain('');
                isset($referer['path']) ? $privacyEntity->setSite($referer['path']) : $privacyEntity->setSite('');

                // Set created
                $created = new \DateTime($row[$csv->header['Data']]);
                $privacyEntity->setCreated($created);

                // Set deleted
                $privacyEntity->setDeleted(0);

                $this->getOwnerEntityManager($ownerId)
                    ->persist($privacyEntity);
                echo('.');
                unset($referer, $lang, $created);
            }
            $this->getOwnerEntityManager($ownerId)->flush();
        } catch (\Exception $e) {
            // @todo aggiungere gestione errore in inserimento
            throw  $e;
        }
    }

    /**
     * Generate and set the UID: structure ID + md5(email) + unixtime(checkin date) + ip address
     *
     * @param string $openDate
     * @param int $portalId
     * @param int $structureId
     * @param string $email
     * @return string
     */
    protected function generateUID (
        $openDate,
        $portalId,
        $structureId,
        $email
    ) {
        $uid = new \DateTime($openDate);
        return sprintf(
            "%s-%s-%s-%s",
            $portalId,
            $structureId,
            md5($email),
            $uid->format('U')
        );
    }

    /**
     * Generate referer url
     *
     * @param int $structureId
     * @param \DateTime $checkIn
     * @param \DateTime $checkOut
     * @param int $portalId
     * @return string
     */
    protected function generateQueryString (
        $structureId,
        \DateTime $checkIn,
        \DateTime $checkOut,
        $portalId
    ) {
        return(sprintf(
            "stid=%s&lg=it&checkin=%s&checkout=%s&numRooms=1&numPax=2&parid=0&pid=%s&view=enquiry&noflash=1",
            $structureId,
            $checkIn->format('d-m-Y'),
            $checkOut->format('d-m-Y'),
            $portalId
        ));
    }

    /**
     * Read a CSV file
     *
     * @param string $file
     * @param string $delimiter
     * @return \stdClass
     */
    protected function readCSVFile (
        $file,
        $delimiter = ';'
    ) {
        $csv = fopen($file, 'r');
        $header = [];
        $body = [];
        while (($tmp = fgetcsv($csv, 10000, $delimiter)) !== false) {
            if (count($header) == 0)  {
                $header = $tmp;
            } else {
                $body[] = $tmp;
            }
        }
        $header = array_flip($header);

        $res = new \stdClass();
        $res->header = $header;
        $res->body = $body;
        return $res;
    }

    /**
     * Get owner entity manager
     *
     * @param $ownerId
     * @return \Doctrine\ORM\EntityManager
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\ORM\ORMException
     */
    protected function getOwnerEntityManager(
        $ownerId
    ) {
        if ($this->em != null) {
            return $this->em;
        }

        // @todo questa deve essere iniettata da un helper...
        $settings = require realpath(__DIR__ . '/../../settings.php');
        $settings = $settings['settings'];
        $dynaDb = $settings['doctrine_privacy']['dynamic_db'];

        $db = $dynaDb['db'] . "_$ownerId";
        $user = $dynaDb['user'] . "_$ownerId";
        $password = md5($dynaDb['password'] . "Fx8k_${ownerId}_5tFg");

        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
            $settings['doctrine_privacy']['meta']['entity_path'],
            $settings['doctrine_privacy']['meta']['auto_generate_proxies'],
            $settings['doctrine_privacy']['meta']['proxy_dir'],
            $settings['doctrine_privacy']['meta']['cache'],
            false
        );

        $connection = array(
            'driver' => $settings['doctrine_privacy']['connection']['driver'],
            'host' => $settings['doctrine_privacy']['connection']['host'],
            'dbname' => $db,
            'user' => $user,
            'password' => $password
        );

        $em = \Doctrine\ORM\EntityManager::create($connection, $config);

        $subscriber = new \App\DoctrineEncrypt\Subscribers\DoctrineEncryptSubscriber(
            new \Doctrine\Common\Annotations\AnnotationReader(),
            new \App\DoctrineEncrypt\Encryptors\OpenSslEncryptor($settings['doctrine_privacy']['encryption_key'])
        );

        $eventManager = $em->getEventManager();
        $eventManager->addEventSubscriber($subscriber);

        $this->em = $em;
        return $this->em;
    }
}