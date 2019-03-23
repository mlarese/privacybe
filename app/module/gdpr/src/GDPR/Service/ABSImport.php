<?php

namespace GDPR\Service;

use GDPR\Entity\Privacy\Privacy as PrivacyEntity;
use GDPR\Exception\ImportException;

class ABSImport {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em = null;

    public function importPortalReservation(
        $ownerId,
        $termId,
        $file
    ) {
        $this->validateimportPortalReservationArguments(
            $ownerId,
            $termId,
            $file
        );

        // Read CSV file
        // @todo manca il controllo se è un file CSV
        $csv = fopen($file, 'r');
        $header = [];
        $body = [];
        while (($tmp = fgetcsv($csv, 10000, ';')) !== false) {
            if (count($header) == 0)  {
                $header = $tmp;
            } else {
                $body[] = $tmp;
            }
        }
        $header = array_flip($header);
        // @todo controllare se l'header cambia...

        /**
         * Get privacy
         *
         * @var $em EntityManager
         */
        $settings = require realpath(__DIR__ . '/../../settings.php');
        $em = $this->getPrivacyDb($settings['settings'], $ownerId);
        /** @var \GDPR\Entity\Privacy\Term $term */
        $term = $em->getRepository('GDPR\Entity\Privacy\Term')->findOneByUid($termId);
        $termParagraphs = $term->getParagraphs();

        // Transform and insert data
        $now = new \DateTime('now');
        try {
            foreach ($body as $row) {

                // Terms flags
                $privacyTerm = (bool)$row[$header['Privacy Term']];
                $newsletterTerm = (bool)$row[$header['Newsletter']];

                // Bypass no minimum requirements
                // @todo creare un messaggio di warning
                if (!$privacyTerm) {
                    continue;
                } else {
                    $privacyEntity = new PrivacyEntity();
                }

                // Set email
                $privacyEntity->setEmail(trim($row[$header['Email']]));

                // Set IP address
                $privacyEntity->setIp(trim($row[$header['Ip Address']]));

                // @todo fare un validatore per il generatore dell'UID (max char length: 128 chars)
                // Generate and set the UID: structure ID + md5(email) + unixtime(checkin date) + ip address
                $uid = new \DateTime($row[$header['Data apertura']]);
                if (strpos($row[$header['Data apertura']], '00:00:00') === false) {
                    $uid = sprintf(
                        "%s-%s-%s-%s",
                        trim($row[$header['IdStruttura']]),
                        md5($privacyEntity->getEmail()),
                        $uid->format('U'),
                        str_replace('.', '', $privacyEntity->getIp())
                    );
                } else {
                    $uid = sprintf(
                        "%s-%s-%s-%s-%s",
                        trim($row[$header['IdStruttura']]),
                        md5($privacyEntity->getEmail()),
                        $uid->format('U'),
                        rand(10000, 99999),
                        str_replace('.', '', $privacyEntity->getIp())
                    );
                }
                $privacyEntity->setId($uid);
                unset($uid);

                // Set reference
                $privacyEntity->setRef(sprintf(
                    "import-console-abs-reservation-%s",
                    $now->format('YMDHi')
                ));

                // Set name
                $name = explode(' ', $row[$header['Ospite']]);
                $privacyEntity->setName(utf8_encode(trim($name[0])));
                unset($name);

                // Set surname
                $privacyEntity->setSurname(utf8_encode(trim(str_replace($privacyEntity->getName(), '', $row[$header['Ospite']]))));

                // Set referer
                $referer = $row[$header['Referer']];

                // Set language
                $lang = utf8_encode(trim($row[$header['Lingua']]));

                // Set form
                $privacyEntity->setForm([
                    'id' => $privacyEntity->getId(),
                    'email' => trim($privacyEntity->getEmail()),
                    'title' => utf8_encode($row[$header['Portale']]),
                    'name' => $privacyEntity->getName(),
                    'surname' => $privacyEntity->getSurname(),
                    'phone' => [],
                    'mobile' => [],
                    'fax' => [],
                    'city' => utf8_encode(trim($row[$header['Città']])),
                    'language' => $lang,
                    'zipcode' => [],
                    'nation' => utf8_encode($row[$header['Nazione']]),
                    'birth date' => [],
                    'ip' => $privacyEntity->getIp(),
                    'iso2language' => $lang,
                    'subscribeurl' => $referer,
                    'privacy' => ($termParagraphs[0]['text'][$lang] ? $termParagraphs[0]['text'][$lang] : $termParagraphs[0]['text']['en'])
                ]);
                $privacyEntity->setCryptedForm(json_encode($privacyEntity->getForm()));

                // Set privacy
                $privacyEntity->setPrivacyFlags([
                    [
                        'code' => 'dati_personali',
                        'selected' => $privacyTerm,
                        'mandatory' => true,
                        'text' => $termParagraphs[0]['treatments'][0]['text'][$lang]
                    ], [
                        'code' => 'newsletter',
                        'selected' => $newsletterTerm,
                        'mandatory' => false,
                        'text' => $termParagraphs[0]['treatments'][1]['text'][$lang]
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
                            "text" => ($termParagraphs[0]['text'][$lang] ? $termParagraphs[0]['text'][$lang] : $termParagraphs[0]['text']['en']),
                            "title" => ($termParagraphs[0]['title'][$lang] ? $termParagraphs[0]['title'][$lang] : $termParagraphs[0]['title']['en']),
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
                $created = new \DateTime($row[$header['Data apertura']]);
                $privacyEntity->setCreated($created);

                // Set deleted
                $privacyEntity->setDeleted(0);

                $em->persist($privacyEntity);
                echo('.');
                unset($referer, $lang, $created);
                //break; // @todo test!!!!!!!!!!!!!!!!!!!!!
            }
            $em->flush();
        } catch (\Exception $e) {
            // @todo aggiungere gestione errore in inserimento
            throw  $e;
        }
    }

    private function validateimportPortalReservationArguments($ownerId, $termId, $file)
    {
        if(!is_integer($ownerId))
        {
            $ownerId = intval($ownerId);
            if($ownerId < 1)
            {
                throw new ImportException(sprintf(
                    "Wrong owner ID. the owner ID must be grater than 0"
                ));
            }
        }

        if (empty($termId)) {
            throw new ImportException(sprintf(
                "Wrong term ID"
            ));
        }

        if (empty($file) ||
            !file_exists($file)
        ) {
            throw new ImportException(sprintf(
                "The file `%s` not exists",
                $file
            ));
        }
    }

    public function importStructureReservation(
        $ownerId,
        $structureId,
        $termId,
        $file
    ) {
        $this->validateimportStructureReservationArguments(
            $structureId,
            $ownerId,
            $termId,
            $file
        );

        // Read CSV file
        // @todo manca il controllo se è un file CSV
        $csv = fopen($file, 'r');
        $header = [];
        $body = [];
        while (($tmp = fgetcsv($csv, 10000, ';')) !== false) {
            if (count($header) == 0)  {
                $header = $tmp;
            } else {
                $body[] = $tmp;
            }
        }
        $header = array_flip($header);
        // @todo controllare se l'header cambia...

        /**
         * Get privacy
         *
         * @var $em EntityManager
         */
        $settings = require realpath(__DIR__ . '/../../settings.php');
        $em = $this->getPrivacyDb($settings['settings'], $ownerId);
        /** @var \GDPR\Entity\Privacy\Term $term */
        $term = $em->getRepository('GDPR\Entity\Privacy\Term')->findOneByUid($termId);
        $termParagraphs = $term->getParagraphs();

        // Transform and insert data
        $now = new \DateTime('now');
        try {
            foreach ($body as $row) {

                // Terms flags
                $privacyTerm = (bool)$row[$header['Privacy Term']];
                $newsletterTerm = (bool)$row[$header['Newsletter']];

                // Bypass no minimum requirements
                // @todo creare un messaggio di warning
                if (!$privacyTerm) {
                    continue;
                } else {
                    $privacyEntity = new PrivacyEntity();
                }

                // Set email
                $privacyEntity->setEmail(trim($row[$header['Email']]));

                if(empty($privacyEntity->getEmail()))
                {
                    continue;
                }

                // Set IP address
                $privacyEntity->setIp(trim($row[$header['Ip Address']]));

                // @todo fare un validatore per il generatore dell'UID (max char length: 128 chars)
                // Generate and set the UID: structure ID + md5(email) + unixtime(checkin date) + ip address
                $uid = new \DateTime($row[$header['Data apertura']]);
                if (strpos($row[$header['Data apertura']], '00:00:00') === false) {
                    $uid = sprintf(
                        "%s-%s-%s-%s",
                        trim($structureId),
                        md5($privacyEntity->getEmail()),
                        $uid->format('U'),
                        str_replace('.', '', $privacyEntity->getIp())
                    );
                } else {
                    $uid = sprintf(
                        "%s-%s-%s-%s-%s",
                        trim($structureId),
                        md5($privacyEntity->getEmail()),
                        $uid->format('U'),
                        rand(10000, 99999),
                        str_replace('.', '', $privacyEntity->getIp())
                    );
                }
                $privacyEntity->setId($uid);
                unset($uid);

                // Set reference
                $privacyEntity->setRef(sprintf(
                    "import-console-abs-reservation-%s",
                    $now->format('YMDHi')
                ));

                // Set name
                $name = explode(' ', $row[$header['Ospite']]);
                $privacyEntity->setName(utf8_encode(trim($name[0])));
                unset($name);

                // Set surname
                $privacyEntity->setSurname(utf8_encode(trim(str_replace($privacyEntity->getName(), '', $row[$header['Ospite']]))));

                // Set referer
                $referer = $row[$header['Referer']];

                // Set language
                $lang = utf8_encode(trim($row[$header['Lingua']]));

                // Set form
                $privacyEntity->setForm([
                    'id' => $privacyEntity->getId(),
                    'email' => trim($privacyEntity->getEmail()),
                    'title' => utf8_encode($row[$header['Portale']]),
                    'name' => $privacyEntity->getName(),
                    'surname' => $privacyEntity->getSurname(),
                    'phone' => [],
                    'mobile' => [],
                    'fax' => [],
                    'city' => utf8_encode(trim($row[$header['Città']])),
                    'language' => $lang,
                    'zipcode' => [],
                    'nation' => utf8_encode($row[$header['Nazione']]),
                    'birth date' => [],
                    'ip' => $privacyEntity->getIp(),
                    'iso2language' => $lang,
                    'subscribeurl' => $referer,
                    'privacy' => (!empty($termParagraphs[0]['text'][$lang]) ? $termParagraphs[0]['text'][$lang] : $termParagraphs[0]['text']['en'])
                ]);
                $privacyEntity->setCryptedForm(json_encode($privacyEntity->getForm()));

                $codeDatiPersonali = 'dati_personali';
                $codeNewsletter = 'newsletters';

                if(isset($termParagraphs[0]['treatments'][0]['name']) && !empty($termParagraphs[0]['treatments'][0]['name']))
                {
                    $codeDatiPersonali = $termParagraphs[0]['treatments'][0]['name'];
                }

                if(isset($termParagraphs[0]['treatments'][1]['name']) && !empty($termParagraphs[0]['treatments'][1]['name']))
                {
                    $codeNewsletter = $termParagraphs[0]['treatments'][1]['name'];
                }

                // Set privacy
                $privacyEntity->setPrivacyFlags([
                    [
                        'code' => $codeDatiPersonali,
                        'selected' => $privacyTerm,
                        'mandatory' => true,
                        'text' => (!empty($termParagraphs[0]['treatments'][0]['text'][$lang]) ? $termParagraphs[0]['treatments'][0]['text'][$lang] : $termParagraphs[0]['treatments'][0]['text']['en'])
                    ], [
                        'code' => $codeNewsletter,
                        'selected' => $newsletterTerm,
                        'mandatory' => false,
                        'text' => (!empty($termParagraphs[0]['treatments'][1]['text'][$lang]) ? $termParagraphs[0]['treatments'][1]['text'][$lang] : $termParagraphs[0]['treatments'][1]['text']['en'])
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
                            "text" => (!empty($termParagraphs[0]['text'][$lang]) ? $termParagraphs[0]['text'][$lang] : $termParagraphs[0]['text']['en']),
                            "title" => (!empty($termParagraphs[0]['title'][$lang]) ? $termParagraphs[0]['title'][$lang] : $termParagraphs[0]['title']['en']),
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
                $created = new \DateTime($row[$header['Data apertura']]);
                $privacyEntity->setCreated($created);

                // Set deleted
                $privacyEntity->setDeleted(0);

                $em->persist($privacyEntity);
                echo('.');
                unset($referer, $lang, $created);
                //break; // @todo test!!!!!!!!!!!!!!!!!!!!!
            }
            $em->flush();
        } catch (\Exception $e) {
            // @todo aggiungere gestione errore in inserimento
            throw  $e;
        }
    }

    private function validateimportStructureReservationArguments($structureId, $ownerId, $termId, $file)
    {
        if(!is_integer($structureId))
        {
            $structureId = intval($structureId);
            if($structureId < 1)
            {
                throw new ImportException(sprintf(
                    "Wrong structure ID. the structure ID must be grater than 0"
                ));
            }
        }

        if(!is_integer($ownerId))
        {
            $ownerId = intval($ownerId);
            if($ownerId < 1)
            {
                throw new ImportException(sprintf(
                    "Wrong owner ID. the owner ID must be grater than 0"
                ));
            }
        }

        if (empty($termId)) {
            throw new ImportException(sprintf(
                "Wrong term ID"
            ));
        }

        if (empty($file) ||
            !file_exists($file)
        ) {
            throw new ImportException(sprintf(
                "The file `%s` not exists",
                $file
            ));
        }
    }

    // TODO: mettere questa funzione e quelle presenti in importUpgrade.php in una classe (Helper o Service) esterno
    private function getPrivacyDb($settings, $ownerId)
    {
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

        return $em;
    }

    /**
     * Import ABS enquiry
     *
     * @param string $ownerId
     * @param string $termId
     * @param string $enquiryUrl
     * @param string $file
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\ORM\ORMException
     */
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

        /** @var \GDPR\Entity\Privacy\Term $term */
        $term = $this->getOwnerEntityManager($ownerId)
            ->getRepository('GDPR\Entity\Privacy\Term')
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

                $codeDatiPersonali = 'dati_personali';
                $codeNewsletter = 'newsletters';

                if(isset($termParagraphs[0]['treatments'][0]['name']) && !empty($termParagraphs[0]['treatments'][0]['name']))
                {
                    $codeDatiPersonali = $termParagraphs[0]['treatments'][0]['name'];
                }

                if(isset($termParagraphs[0]['treatments'][1]['name']) && !empty($termParagraphs[0]['treatments'][1]['name']))
                {
                    $codeNewsletter = $termParagraphs[0]['treatments'][1]['name'];
                }

                // Set privacy
                $privacyEntity->setPrivacyFlags([
                    [
                        'code' => $codeDatiPersonali,
                        'selected' => $privacyTerm,
                        'mandatory' => true,
                        'text' => (isset($termParagraphs[0]['treatments'][0]['text'][$lang])) ? $termParagraphs[0]['treatments'][0]['text'][$lang] : $termParagraphs[0]['treatments'][0]['text']['en']
                    ], [
                        'code' => $codeNewsletter,
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
     * Import StoreONE clients
     *
     * @param string $ownerId
     * @param string $termId
     * @param string $registrationUrl
     * @param string $file
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\ORM\ORMException
     */
    public function importStoreONE (
        $ownerId,
        $termId,
        $registrationUrl,
        $file
    ) {

        // Expected CSV header
        $expectedHeader = json_decode('{"ID":0,"Nome":1,"Cognome":2,"Indirizzo":3,"Citt\u00e0":4,"CAP":5,"Provincia":6,"Nazione":7,"Telefono":8,"Fax":9,"Mobile":10,"E-Mail":11,"Data registrazione":12}', true);

        // Read the CSV file
        $csv = $this->readCSVFile($file);

        // Check if import header was changed
        if (count(array_diff($expectedHeader, $csv->header)) !== 0) {
            throw new \Exception(sprintf(
                "Something was changed in CSV file header"
            ));
        }

        /** @var \GDPR\Entity\Privacy\Term $term */
        $term = $this->getOwnerEntityManager($ownerId)
            ->getRepository('GDPR\Entity\Privacy\Term')
            ->findOneByUid($termId);
        $termParagraphs = $term->getParagraphs();

        // Transform and insert data
        $now = new \DateTime('now');
        try {
            foreach ($csv->body as $row) {

                // Check if the user already exist in this DataONE account
                $user = $this->getOwnerEntityManager($ownerId)
                    ->getRepository('GDPR\Entity\Privacy\Privacy')
                    ->findOneByEmail($row[$csv->header['E-Mail']]);
                if (!is_null($user)) {

                    // This user was already added, continue with next user
                    continue;
                }

                // Bypass invalid or  NULL registration dates
                if (empty($row[$csv->header['Data registrazione']]) ||
                    $row[$csv->header['Data registrazione']] == '0000-00-00 00:00:00'
                ) {
                    continue;
                }

                // Bypass empty name and surname
                if (empty(trim($row[$csv->header['Nome']]))) {
                    continue;
                }
                if (empty(trim($row[$csv->header['Cognome']]))) {
                    continue;
                }

                // Set the default country
                if (empty(trim($row[$csv->header['Nazione']]))) {
                    $row[$csv->header['Nazione']] = 'IT';
                }

                // Create a new entry
                $privacyEntity = new PrivacyEntity();

                // Set email
                $privacyEntity->setEmail(trim($row[$csv->header['E-Mail']]));

                // Set no IP address in Store ONE Registration
                $privacyEntity->setIp('');

                // Set UID
                $privacyEntity->setId(
                    sprintf(
                        "%s-%s-%s",
                        $row[$csv->header['ID']],
                        md5($privacyEntity->getEmail()),
                        rand(100000000, 999999999)
                    )
                );

                // Set reference
                $privacyEntity->setRef(sprintf(
                    "import-console-storeone-%s",
                    $now->format('YMDHi')
                ));

                // Set name
                $privacyEntity->setName(ucfirst(trim(utf8_encode($row[$csv->header['Nome']]))));
                // Set surname
                $privacyEntity->setSurname(ucfirst(trim(utf8_encode($row[$csv->header['Cognome']]))));

                // Set language
                $privacyEntity->setLanguage(strtolower(substr(trim($row[$csv->header['Nazione']]), 0, 2)));

                $privacyEntity->setTelephone((!empty(trim(utf8_encode($row[$csv->header['Telefono']])))) ? trim(utf8_encode($row[$csv->header['Telefono']])) : trim(utf8_encode($row[$csv->header['Mobile']])));

                // Set form
                $privacyEntity->setForm([
                    'id' => $privacyEntity->getId(),
                    'email' => $privacyEntity->getEmail(),
                    'name' => $privacyEntity->getName(),
                    'surname' => $privacyEntity->getSurname(),
                    'phone' => trim(utf8_encode($row[$csv->header['Telefono']])),
                    'mobile' => trim(utf8_encode($row[$csv->header['Mobile']])),
                    'fax' => trim(utf8_encode($row[$csv->header['Fax']])),
                    'address' => trim(utf8_encode($row[$csv->header['Indirizzo']])),
                    'city' => trim(utf8_encode($row[$csv->header['Città']])),
                    'language' => $privacyEntity->getLanguage(),
                    'zipcode' => trim(utf8_encode($row[$csv->header['CAP']])),
                    'nation' => $row[$csv->header['Nazione']],
                    'ip' => $privacyEntity->getIp(),
                    'subscribeurl' => $registrationUrl,
                    'privacy' => (isset($termParagraphs[0]['text'][$privacyEntity->getLanguage()])) ? $termParagraphs[0]['text'][$privacyEntity->getLanguage()] : $termParagraphs[0]['text']['en']
                ]);
                $privacyEntity->setCryptedForm(json_encode($privacyEntity->getForm()));

                if (isset($termParagraphs[0]['treatments'][0]['name']) &&
                    !empty($termParagraphs[0]['treatments'][0]['name'])
                ) {
                    $codeDatiPersonali = $termParagraphs[0]['treatments'][0]['name'];
                }

                // Set privacy
                $privacyEntity->setPrivacyFlags([
                    [
                        'code' => $codeDatiPersonali,
                        'selected' => true,
                        'mandatory' => true,
                        'text' => (isset($termParagraphs[0]['treatments'][0]['text'][$privacyEntity->getLanguage()])) ? $termParagraphs[0]['treatments'][0]['text'][$privacyEntity->getLanguage()] : $termParagraphs[0]['treatments'][0]['text']['en']
                    ]
                ]);
                $privacyEntity->setPrivacy([
                    "referrer" => $registrationUrl,
                    "ownerId" => $ownerId,
                    "termId" => $termId,
                    "language" => $privacyEntity->getLanguage(),
                    "name" => $term->getName(),
                    "paragraphs" => [
                        [
                            "text" => (isset($termParagraphs[0]['text'][$privacyEntity->getLanguage()])) ? $termParagraphs[0]['text'][$privacyEntity->getLanguage()] : $termParagraphs[0]['text']['en'],
                            "title" => (isset($termParagraphs[0]['title'][$privacyEntity->getLanguage()])) ? $termParagraphs[0]['title'][$privacyEntity->getLanguage()] : $termParagraphs[0]['title']['en'],
                            "treatments" => $privacyEntity->getPrivacyFlags()
                        ]
                    ],
                ]);

                // Set term ID
                $privacyEntity->setTermId($termId);

                // Set domain & site
                $referer = parse_url($registrationUrl);
                isset($referer['host']) ? $privacyEntity->setDomain($referer['host']) : $privacyEntity->setDomain('');
                isset($referer['path']) ? $privacyEntity->setSite($referer['path']) : $privacyEntity->setSite('');


                // Set created
                $created = new \DateTime($row[$csv->header['Data registrazione']]);
                $privacyEntity->setCreated($created);
                unset($created);

                // Set deleted
                $privacyEntity->setDeleted(0);

                $this->getOwnerEntityManager($ownerId)
                    ->persist($privacyEntity);
                echo('.');
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
        if (strpos($openDate, '00:00:00') === false) {
            return sprintf(
                "%s-%s-%s-%s",
                $portalId,
                $structureId,
                md5($email),
                $uid->format('U')
            );
        }
        else {
            return sprintf(
                "%s-%s-%s-%s-%s",
                $portalId,
                $structureId,
                md5($email),
                $uid->format('U'),
                rand(10000, 99999)
            );
        }

        /*return sprintf(
            "%s-%s-%s-%s",
            $portalId,
            $structureId,
            md5($email),
            $uid->format('U')
        );*/
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