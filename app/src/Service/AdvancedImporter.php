<?php

namespace App\Service;

use App\Entity\Privacy\Privacy as PrivacyEntity;
use App\Exception\ImportException;

class AdvancedImporter {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em = null;

    /**
     * @param string $columnSeparator
     * @param string $file
     * @return array
     * @throws ImportException
     */
    function preset (
        $columnSeparator,
        $file
    ) {

        // Validate column separator
        $columnSeparator = trim(urldecode($columnSeparator));
        if (empty($columnSeparator)) {
            throw new ImportException(sprintf(
                "Wrong column separator ID"
            ));
        }

        // Validate file
        if (empty($file) ||
            !file_exists($file)
        ) {
            throw new ImportException(sprintf(
                "The file `%s` not exists",
                $file
            ));
        }

        // Read CSV file
        $tmpFile = '/tmp/advancedimport_' . md5(mktime());
        copy($file, $tmpFile);
        $csv = $this->readCSVFile($tmpFile, $columnSeparator);

        return [
            'tmp_csv' => $tmpFile,
            'header' => array_flip($csv->header)
        ];
    }

    /**
     * @param array $fields
     * @param bool $dryRun
     * @return array
     * @throws ImportException
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\ORM\ORMException
     */
    function import (
        $fields,
        $dryRun = true
    ) {

        // Intercept implicit action
        if (isset($fields['action']) &&
            strtolower($fields['action']) == 'submit'
        ) {
            $dryRun = false;
        }

        // Read the CSV file
        if (!isset($fields['file'])) {
            throw new ImportException(sptintf(
                'CSV file field not found'
            ));
        }
        $csv = $this->readCSVFile($fields['file']);

        // Need UTF8 encode
        $utf8Encode = false;
        if (isset($fields['utf8Encode']) &&
            $fields['utf8Encode']
        ) {
            $utf8Encode = (bool)$fields['utf8Encode'];
        }

        // Get term ID
        if (!isset($fields['ownerId'])) {
            throw new ImportException(sptintf(
                'Owner ID field not found'
            ));
        }
        $ownerId = trim($fields['ownerId']);
        if (!isset($fields['termId'])) {
            throw new ImportException(sptintf(
                'Term ID field not found'
            ));
        }
        $termId = trim($fields['termId']);
        /** @var \App\Entity\Privacy\Term $term */
        $term = $this->getOwnerEntityManager($ownerId)
            ->getRepository('App\Entity\Privacy\Term')
            ->findOneByUid($termId);
        $termParagraphs = $term->getParagraphs();

        // Transform and insert data
        $now = new \DateTime('now');
        $dryRunData = [
            'total_counter' => count($csv->body),
            'imported_counter' => 0,
            'examples' => []
        ];
        try {
            foreach ($csv->body as $row) {

                // Set external ID
                if (isset($fields['externalId'])) {
                    $externalId = $this->composeValue (
                        $fields['externalId'],
                        $row,
                        true,
                        $utf8Encode
                    );
                    if (is_null($externalId)) {
                        unset($externalId);
                    }
                }
                if ($fields['externalIdRequired'] &&
                    !isset($externalId)
                ) {
                    continue;
                }

                // Bypass invalid email
                if (!isset($fields['email'])) {
                    continue;
                }
                $email = $this->composeValue (
                    $fields['email'],
                    $row,
                    false,
                    $utf8Encode
                );
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                if (!$email ||
                    is_null($email)
                ) {
                    continue;
                }

                // Bypass invalid name
                if (!isset($fields['name'])) {
                    continue;
                }
                $name = $this->composeValue (
                    $fields['name'],
                    $row,
                    true,
                    $utf8Encode
                );
                if (is_null($name)) {
                    continue;
                } else if (isset($fields['nameFormat'])) {
                    switch (strtolower($fields['nameFormat'])) {
                        case 'xxxx name':
                            $name = explode(' ', $name)[0];
                            break;
                        case 'name xxxx':
                            $name = explode(' ', $name)[1];
                            break;
                    }
                }
                $name = ucwords(strtolower($name));

                // Bypass invalid surname
                if (!isset($fields['surname'])) {
                    continue;
                }
                $surname = $this->composeValue (
                    $fields['surname'],
                    $row,
                    true,
                    $utf8Encode
                );
                if (is_null($surname)) {
                    continue;
                } else if (isset($fields['surnameFormat'])) {
                    switch (strtolower($fields['surnameFormat'])) {
                        case 'xxxx surname':
                            $surname = explode(' ', $surname)[0];
                            break;
                        case 'surname xxxx':
                            $surname = explode(' ', $surname)[1];
                            break;
                    }
                }
                $surname = ucwords(strtolower($surname));

                // Set language
                if (isset($fields['language'])) {
                    $language = $this->composeValue (
                        $fields['language'],
                        $row,
                        false,
                        $utf8Encode
                    );
                } else {
                    $language = $this->composeValue (
                        $fields['languageDefault'],
                        $row,
                        false,
                        $utf8Encode
                    );
                }
                if (is_null($language)) {
                    unset($language);
                } else if (isset($fields['languageFormat'])) {
                    switch (strtolower($fields['languageFormat'])) {
                        default:
                            $language = strtolower(substr($language, 0, 2));
                            break;
                    }
                }

                // Set IP address
                if (isset($fields['ipaddress'])) {
                    $ipaddress = $this->composeValue (
                        $fields['ipaddress'],
                        $row,
                        false,
                        $utf8Encode
                    );
                    $ipaddress = filter_var($ipaddress, FILTER_VALIDATE_IP);
                    if (!$ipaddress ||
                        is_null($ipaddress)
                    ) {
                        unset($ipaddress);
                    }
                }
                if ($fields['ipaddressRequired'] &&
                    !isset($ipaddress)) {
                    continue;
                }

                // Set telephone
                if (isset($fields['telephone'])) {
                    $telephone = $this->composeValue (
                        $fields['telephone'],
                        $row,
                        false,
                        $utf8Encode
                    );
                    if (is_null($telephone)) {
                        unset($telephone);
                    }
                }
                if ($fields['telephoneRequired'] &&
                    !isset($telephone)) {
                    continue;
                }

                // Set mobile
                if (isset($fields['mobile'])) {
                    $mobile = $this->composeValue (
                        $fields['mobile'],
                        $row,
                        false,
                        $utf8Encode
                    );
                    if (is_null($mobile)) {
                        unset($mobile);
                    }
                }
                if ($fields['mobileRequired'] &&
                    !isset($mobile)) {
                    continue;
                }

                // Set fax
                if (isset($fields['fax'])) {
                    $fax = $this->composeValue (
                        $fields['fax'],
                        $row,
                        false,
                        $utf8Encode
                    );
                    if (is_null($fax)) {
                        unset($fax);
                    }
                }
                if ($fields['faxRequired'] &&
                    !isset($fax)) {
                    continue;
                }

                // Set address
                if (isset($fields['address'])) {
                    $address = $this->composeValue (
                        $fields['address'],
                        $row,
                        true,
                        $utf8Encode
                    );
                    if (is_null($address)) {
                        unset($address);
                    }
                }
                if ($fields['addressRequired'] &&
                    !isset($address)) {
                    continue;
                }

                // Set zipcode
                if (isset($fields['zipcode'])) {
                    $zipcode = $this->composeValue (
                        $fields['zipcode'],
                        $row,
                        false,
                        $utf8Encode
                    );
                    if (is_null($zipcode)) {
                        unset($zipcode);
                    }
                }
                if ($fields['zipcodeRequired'] &&
                    !isset($zipcode)) {
                    continue;
                }

                // Set city
                if (isset($fields['city'])) {
                    $city = $this->composeValue (
                        $fields['city'],
                        $row,
                        true,
                        $utf8Encode
                    );
                    if (is_null($city)) {
                        unset($city);
                    }
                }
                if ($fields['cityRequired'] &&
                    !isset($city)) {
                    continue;
                }

                // Set country
                if (isset($fields['country'])) {
                    $country = $this->composeValue (
                        $fields['country'],
                        $row,
                        false,
                        $utf8Encode
                    );
                } else {
                    $country = $this->composeValue (
                        $fields['countryDefault'],
                        $row,
                        false,
                        $utf8Encode
                    );
                }
                if (is_null($country)) {
                    unset($country);
                } else if (isset($fields['countryFormat'])) {
                    switch (strtolower($fields['countryFormat'])) {
                        case 'xx':
                            $country = strtoupper(substr($country,0, 2));
                            break;
                    }
                }
                if ($fields['countryRequired'] &&
                    !isset($country)) {
                    continue;
                }

                // Set registration date
                if (isset($fields['registrationDate'])) {
                    $registrationDate = $this->composeValue (
                        $fields['registrationDate'],
                        $row,
                        false,
                        $utf8Encode
                    );
                } else {
                    $registrationDate = $this->composeValue (
                        $fields['registrationDateDefault'],
                        $row,
                        false,
                        $utf8Encode
                    );
                }
                if (is_null($registrationDate)) {
                    unset($registrationDate);
                } else if (isset($fields['registrationDateFormat'])) {
                    try {
                        switch (strtolower($fields['registrationDateFormat'])) {
                            case 'yyyy-mm-dd':
                                $registrationDate = substr($registrationDate, 0, 10);
                                $registrationDate = new \DateTime($registrationDate . ' 00:00:00');
                                break;
                            case 'yyyy-mm-dd hh:mm:ss':
                                $registrationDate = new \DateTime($registrationDate);
                                break;
                            case 'yy-mm-dd':
                                $registrationDate = substr($registrationDate, 0, 10);
                                $registrationDate = new \DateTime($registrationDate . ' 00:00:00');
                                break;
                            case 'yy-mm-dd hh:mm:ss':
                                $registrationDate = new \DateTime($registrationDate);
                                break;
                            case 'yyyy/mm/dd':
                                $registrationDate = substr($registrationDate, 0, 10);
                                $registrationDate = new \DateTime(str_replace('//', '-', $registrationDate) . ' 00:00:00');
                                break;
                            case 'yyyy/mm/dd hh:mm:ss':
                                $registrationDate = new \DateTime(str_replace('//', '-', $registrationDate));
                                break;
                            case 'yy/mm/dd':
                                $registrationDate = substr($registrationDate, 0, 10);
                                $registrationDate = new \DateTime(str_replace('//', '-', $registrationDate) . ' 00:00:00');
                                break;
                            case 'yy/mm/dd hh:mm:ss':
                                $registrationDate = new \DateTime(str_replace('//', '-', $registrationDate));
                                break;
                        }
                    } catch (\Exception $e) {
                        unset($registrationDate);
                    }
                }
                if ($fields['registrationDateRequired'] &&
                    !isset($registrationDate)) {
                    continue;
                }

                // Set registration url
                if (isset($fields['registrationUrl'])) {
                    $registrationUrl = $this->composeValue (
                        $fields['registrationUrl'],
                        $row,
                        false,
                        $utf8Encode
                    );
                } else {
                    $registrationUrl = trim($fields['registrationUrlDefault']);
                }
                $registrationUrl = filter_var($registrationUrl, FILTER_VALIDATE_URL);
                if (!$registrationUrl ||
                    is_null($registrationUrl)
                ) {
                    unset($registrationUrl);
                }
                if ($fields['registrationUrlRequired'] &&
                    !isset($registrationUrl)) {
                    continue;
                }

                // Set personal data agreement
                if (isset($fields['personalDataAgreement'])) {
                    $personalDataAgreement = (bool)$this->composeValue (
                        $fields['personalDataAgreement'],
                        $row,
                        false,
                        $utf8Encode
                    );
                } else {
                    $personalDataAgreement = (bool)$fields['personalDataAgreementDefault'];
                }
                if (is_null($personalDataAgreement)) {
                    unset($personalDataAgreement);
                }
                if ($fields['personalDataAgreementRequired'] &&
                    (!isset($personalDataAgreement) || !$personalDataAgreement)
                ) {
                    continue;
                }

                // Set newsletter agreement
                if (isset($fields['newsletterAgreement'])) {
                    $newsletterAgreement = (bool)$this->composeValue (
                        $fields['newsletterAgreement'],
                        $row,
                        false,
                        $utf8Encode
                    );
                } else {
                    $newsletterAgreement = (bool)$fields['newsletterAgreementDefault'];
                }
                if (is_null($newsletterAgreement)) {
                    unset($newsletterAgreement);
                }
                if ($fields['newsletterAgreementRequired'] &&
                    (!isset($newsletterAgreement) || !$newsletterAgreement)
                ) {
                    continue;
                }

                // Update dry run
                if ($dryRun) {
                    $dryRunData['imported_counter']++;
                    if (count($dryRunData['examples']) < 10 ) {
                        $dryRunData['examples'][] = [
                            'owner id' => $ownerId,
                            'term id' => $termId,
                            'external id' => isset($externalId) ? $externalId : '',
                            'email' => $email,
                            'name' => $name,
                            'surname' => $surname,
                            'language' => $language,
                            'ip address' => isset($ipaddress) ? $ipaddress : '',
                            'telephone' => isset($telephone) ? $telephone : '',
                            'mobile' => isset($mobile) ? $mobile : '',
                            'fax' => isset($fax) ? $fax : '',
                            'address' => isset($address) ? $address : '',
                            'zip code' => isset($zipcode) ? $zipcode : '',
                            'city' => isset($city) ? $city : '',
                            'country' => isset($country) ? $country : '',
                            'registration date' => (isset($registrationDate)) ? $registrationDate->format('Y-m-d h:i:s') : '',
                            'registration url' => isset($registrationUrl) ? $registrationUrl : '',
                            'personal data agreement' => $personalDataAgreement,
                            'newsletter agreement' => $newsletterAgreement
                        ];
                    }
                } else {

                    // Create a new entry
                    $privacyEntity = new PrivacyEntity();
                    $tmpTelephone = (isset($telephone)) ? $telephone : $mobile;
                    if (isset($termParagraphs[0]['treatments'][0]['name']) &&
                        !empty($termParagraphs[0]['treatments'][0]['name'])
                    ) {
                        $codeDatiPersonali = $termParagraphs[0]['treatments'][0]['name'];
                    }
                    $tmpRegistrationUrl = parse_url($registrationUrl);
                    $privacyEntity->setEmail($email)
                        ->setIp(isset($ipaddress) ? $ipaddress : '')
                        ->setId(
                            sprintf(
                                "ai-%s-%s-%s-%s",
                                md5($privacyEntity->getEmail()),
                                md5($name . $surname),
                                rand(100000000, 999999999),
                                mktime()
                            )
                        )->setRef(
                            sprintf(
                                "advanced-import-%s",
                                $now->format('YMDHi')
                            )
                        )->setName($name)
                        ->setSurname($surname)
                        ->setLanguage($language)
                        ->setTelephone((isset($tmpTelephone)) ? $tmpTelephone : '')
                        ->setForm(
                            [
                                'id' => isset($externalId) ? $externalId : '',
                                'email' => $email,
                                'name' => $name,
                                'surname' => $surname,
                                'phone' => isset($telephone) ? $telephone : '',
                                'mobile' => isset($mobile) ? $mobile : '',
                                'fax' => isset($fax) ? $fax : '',
                                'address' => isset($address) ? $address : '',
                                'city' => isset($city) ? $city : '',
                                'language' => isset($language) ? $language : '',
                                'zipcode' => isset($zipcode) ? $zipcode : '',
                                'nation' => isset($country) ? $country : '',
                                'ip' => isset($ipaddress) ? $ipaddress : '',
                                'subscribeurl' => isset($registrationUrl) ? $registrationUrl : '',
                                'privacy' => (isset($termParagraphs[0]['text'][$privacyEntity->getLanguage()])) ? $termParagraphs[0]['text'][$privacyEntity->getLanguage()] : $termParagraphs[0]['text']['en']
                            ]
                        )->setCryptedForm(
                            json_encode($privacyEntity->getForm())
                        )->setPrivacyFlags(
                            [
                                [
                                    'code' => $codeDatiPersonali,
                                    'selected' => true,
                                    'mandatory' => true,
                                    'text' => (isset($termParagraphs[0]['treatments'][0]['text'][$privacyEntity->getLanguage()])) ? $termParagraphs[0]['treatments'][0]['text'][$privacyEntity->getLanguage()] : $termParagraphs[0]['treatments'][0]['text']['en']
                                ]
                            ]
                        )->setPrivacy(
                            [
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
                            ]
                        )->setTermId($termId)
                        ->setDomain(isset($tmpRegistrationUrl['host']) ? $tmpRegistrationUrl['host'] : '')
                        ->setSite(isset($tmpRegistrationUrl['path']) ? $tmpRegistrationUrl['path'] : '')
                        ->setCreated($registrationDate)
                        ->setDeleted(0);
                    $this->getOwnerEntityManager($ownerId)
                        ->persist($privacyEntity);

                    // Unset generated values
                    $externalId = $email = $name = $surname = $language = $telephone = $mobile = $fax = $address = $zipcode = $city = $country = null;
                    $registrationDate = $registrationUrl = $personalDataAgreement = $newsletterAgreement = $tmpTelephone = $codeDatiPersonali = null;
                    $tmpRegistrationUrl = null;
                    unset($externalId, $email, $name, $surname, $language, $telephone, $mobile, $fax, $address, $zipcode, $city, $country);
                    unset($registrationDate, $registrationUrl, $personalDataAgreement, $newsletterAgreement, $tmpTelephone, $codeDatiPersonali);
                    unset($tmpRegistrationUrl);
                }
            }
            if ($dryRun) {
                return $dryRunData;
            } else {
                $this->getOwnerEntityManager($ownerId)->flush();
                return true;
            }
        } catch (\Exception $e) {
            // @todo aggiungere gestione errore in inserimento
            throw  $e;
        }
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

    /**
     * Compose value
     *
     * @param string|array $fieldId
     * @param array $row
     * @param bool $multipleValue
     * @param bool $enableUTF8Encode
     * @return null|string
     */
    protected function composeValue (
        $fieldId,
        array $row,
        $multipleValue = true,
        $enableUTF8Encode = false
    ) {
        if (empty($fieldId)) {
            return null;
        }
        if (isset($fieldId) &&
            !empty($fieldId)
        ) {
            $value = '';
            if (is_array($fieldId)) {
                foreach ($fieldId as $k => $item) {
                    if ($k > 0) {
                        if (!$multipleValue) {
                            continue;
                        } else {
                            $value .= ' ';
                        }
                    }
                    $value .= trim($row[$item]);
                }
            } else if (is_string($fieldId)) {
                $value = trim($row[$fieldId]);
                if (empty($value)) {
                    return null;
                }
            } else {
                return null;
            }
            if ($enableUTF8Encode) {
                $value = utf8_encode($value);
            }
            if (!empty($value)) {
                return $value;
            }
        }

        return null;
    }
}