<?php

namespace App\Service\MailUP;

use App\Exception\MailUPListException;
use App\Exception\MailUPRecipientException;
use App\Service\MailUP\Token as MailUPTokenService;
use App\Entity\Privacy\MailUpListTTL;
use App\Entity\Privacy\MailUpRecipientTTL;
use Console\Helper\Log as LogHelper;

class Recipient extends Base {

    /**
     * Get all recipients by List ID and Owner ID
     *
     * @param int $ownerId
     * @param int $listId
     *
     * @return array
     * @throws MailUPListException
     * @throws MailUPRecipientException
     */
    public function getAllRecipientsFromAListByOwnerId (
        int $ownerId,
        int $listId
    ) {
        if (empty($listId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong List ID"
            ));
        }

        $tokenService = new MailUPTokenService();
        $token = $tokenService->getTokenByOwnerId($ownerId);
        try {
            $result = $this->authorizedApiCall (
                $ownerId,
                $token,
                self::CALL_TYPE_GET,
                sprintf(
                    '/API/v1.1/Rest/ConsoleService.svc/Console/List/%s/Recipients/EmailOptins',
                    $listId
                )
            );
        } catch (\Exception $e) {
            throw new MailUPListException($e);
        }

        if (!empty($result) && isset($result['Items'])) {
            return $result['Items'];
        }
        return $result;
    }

    /**
     * Add a recipient to a list by Owner ID
     *
     * @param int $ownerId
     * @param int $listId
     * @param string $email
     * @param string $name
     * @param string $surname
     * @param array $optionalFields
     * @param \DateTime $expireDate
     *
     * @return MailUpRecipientTTL|null
     *
     * @throws MailUPListException
     * @throws MailUPRecipientException
     */
    public function addToListByOwnerId (
        int $ownerId,
        int $listId,
        string $email,
        string $name,
        string $surname,
        array $optionalFields = [],
        \DateTime $expireDate
    ) {
        if (empty($listId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong List ID"
            ));
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new MailUPRecipientException(sprintf(
                "Wrong %s recipient email",
                $email
            ));
        }

        // Create fields
        $fields = [];
        if (!empty($name)) {
            $fields[] = [
                'Description' => 'name',
                'Id' => 1,
                'Value'  => $name
            ];
        }
        if (!empty($surname)) {
            $fields[] = [
                'Description' => 'surname',
                'Id' => 2,
                'Value'  => $surname
            ];
        }
        foreach ($optionalFields as $field => $value) {
            if (!empty($value)) {
                $fields[] = [
                    'Description' => $field,
                    'Id' => count($fields) + 1,
                    'Value'  => $value
                ];
            }
        }

        $tokenService = new MailUPTokenService();
        $token = $tokenService->getTokenByOwnerId($ownerId);
        try {
            $recipientId = $this->authorizedApiCall (
                $ownerId,
                $token,
                self::CALL_TYPE_POST,
                sprintf(
                    '/API/v1.1/Rest/ConsoleService.svc/Console/List/%s/Recipient',
                    $listId
                ),
                json_encode([
                    'Email' => $email,
                    "Fields" => $fields,
                ])
            );
        } catch (\Exception $e) {
            throw new MailUPListException($e);
        }

        // Get the entity manager
        $em = $this->getEntityManagerByOwnerId($ownerId);

        // Check if list exist as TTL entity. If not exist add recipient ID as TTL entity
        /** @var MailUpListTTL $list */
        $list = $em->getRepository(MailUpListTTL::class)
            ->findOneBy([
                'id' => $listId,
            ]);
        $recipientTTL = $em->getRepository(MailUpRecipientTTL::class)
            ->find([
                'id' => $recipientId,
                'list' => $listId
            ]);
        if (is_null($list)) {
            if (is_null($recipientTTL)) {

                // Save new entity
                $recipientTTL = new MailUpRecipientTTL();
                $recipientTTL->setId($recipientId)
                    ->setList($listId)
                    ->setCreated(new \DateTime('now'))
                    ->setExpire($expireDate);
            } else {

                // Update entity
                $recipientTTL->setUpdated(new \DateTime('now'))
                    ->setExpire($expireDate);
            }
            $em->persist($recipientTTL);
            $em->flush();
        }

        return $recipientTTL;
    }

    /**
     * Add multiple recipients to a list by Owner ID
     *
     * @param int $ownerId
     * @param int $listId
     * @param array $recipients
     *
     * @throws MailUPListException
     * @throws MailUPRecipientException
     */
    public function addMultipleRecipientsToListByOwnerId (
        int $ownerId,
        int $listId,
        array $recipients = []
    ) {
        if (empty($listId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong List ID"
            ));
        }

        // Normalize and filter all recipients
        $filteredRecipients = [];
        $expiringRecipients = [];
        foreach ($recipients as $recipientFields) {
            $email = '';
            $expireDate = null;
            $fields = [];
            foreach ($recipientFields as $field => $value) {
                if (!empty($value)) {
                    if (strtolower($field) == 'email') {
                        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
                            continue;
                        } else {
                            $email = $value;
                        }
                    } else if (strtolower($field) == 'expiredate') {
                        if (is_object($value) && get_class($value) == 'DateTime') {
                            $expireDate = $value;
                        }
                    } else {
                        $fields[] = [
                            'Description' => $field,
                            'Id' => count($fields) + 1,
                            'Value'  => $value
                        ];
                    }
                }
            }
            $filteredRecipients[] = [
                'Email' => $email,
                'Fields' => $fields
            ];
            if (!empty($email) &&
                !empty($expireDate)
            ) {
                $expiringRecipients[$email] = $expireDate;
            }
        }

        $tokenService = new MailUPTokenService();
        $token = $tokenService->getTokenByOwnerId($ownerId);
        try {
            $importId = $this->authorizedApiCall (
                $ownerId,
                $token,
                self::CALL_TYPE_POST,
                sprintf(
                    '/API/v1.1/Rest/ConsoleService.svc/Console/List/%s/Recipients',
                    $listId
                ),
                json_encode($filteredRecipients)
            );
        } catch (\Exception $e) {
            throw new MailUPListException($e);
        }

        sleep(2);
        $importProcessIsWorking = true;
        do {
            try {
                $importResponse = $this->authorizedApiCall (
                    $ownerId,
                    $token,
                    self::CALL_TYPE_GET,
                    sprintf(
                        '/API/v1.1/Rest/ConsoleService.svc/Console/Import/%s',
                        $importId
                    )
                );
                if (is_array($importResponse) &&
                    isset($importResponse['Completed']) &&
                    $importResponse['Completed'] == 'True'
                ) {
                    $importProcessIsWorking = false;
                } else {
                    sleep(5);
                }
            } catch (\Exception $e) {
                throw new MailUPListException($e);
            }
        } while ($importProcessIsWorking);

        // @todo read mail, match email and save ttl
        $allListRecipients = $this->getAllRecipientsFromAListByOwnerId(
            $ownerId,
            $listId
        );

        // Get the entity manager
        $em = $this->getEntityManagerByOwnerId($ownerId);
        foreach ($allListRecipients as $recipient) {
            if (isset($expiringRecipients[$recipient['Email']])) {
                $recipientId = $recipient['idRecipient'];
                $expireDate = $expiringRecipients[$recipient['Email']];

                // Check if list exist as TTL entity. If not exist add recipient ID as TTL entity
                /** @var MailUpListTTL $list */
                $list = $em->getRepository(MailUpListTTL::class)
                    ->findOneBy([
                        'id' => $listId,
                    ]);
                $recipientTTL = $em->getRepository(MailUpRecipientTTL::class)
                    ->find([
                        'id' => $recipientId,
                        'list' => $listId
                    ]);
                if (is_null($list)) {
                    if (is_null($recipientTTL)) {

                        // Save new entity
                        $recipientTTL = new MailUpRecipientTTL();
                        $recipientTTL->setId($recipientId)
                            ->setList($listId)
                            ->setCreated(new \DateTime('now'))
                            ->setExpire($expireDate);
                    } else {

                        // Update entity
                        $recipientTTL->setUpdated(new \DateTime('now'))
                            ->setExpire($expireDate);
                    }
                    $em->persist($recipientTTL);
                }
            }
        }
        $em->flush();
    }

    /**
     * Maintenance MaiLUP lists recipients by Owner ID
     *
     * @param int $ownerId
     *
     * @return null
     */
    public function maintenanceRecipientsByOwnerId (
        int $ownerId
    ) {

        // Get the entity manager
        $em = $this->getEntityManagerByOwnerId($ownerId);

        // Get all expired lists
        $now = new \DateTime('now');
        /** @var \Doctrine\ORM\Query $q */
        $q = $em->createQuery(sprintf(
            "SELECT r.id, r.list FROM %s AS r WHERE r.expire <= '%s'",
            MailUpRecipientTTL::class,
            $now->format('Y-m-d H:i:s')
        ));
        $result = $q->execute();
        if (empty($result)) {
            return null;
        }
        $log = new LogHelper();
        foreach ($result as $recipient) {
            /** @var MailUpRecipientTTL $recipientTTL */
            $recipientTTL = $em->getRepository(MailUpRecipientTTL::class)
                ->findOneBy([
                    'id' => $recipient['id'],
                    'list' => $recipient['list']
                ]);
            try {

                // Delete recipient from MailUP list
                $res = $this->deleteByOwnerId (
                    $ownerId,
                    $recipientTTL
                );
            } catch (\Exception $e) {

                // Save error to log
                $log->error(sprintf(
                    $e->getMessage()
                ), $e);

                // Send an error email
                $tokenService = new MailUPTokenService();
                $token = $tokenService->getTokenByOwnerId($ownerId);
                $this->sendGenericEmail (
                    $this->getContainer(),
                    [ 'error_message' => sprintf(
                        'Errore durante l\'eliminazione del recipient %s dalla lista %s per l\'owner ID %s: %s',
                        $recipientTTL->getId(),
                        $recipientTTL->getList(),
                        $ownerId,
                        $e->getMessage()
                    )],
                    'mailup/error',
                    'it',
                    'privacy@mm-one.com',
                    $token->getAlertEmail(),
                    'dataone_emails',
                    'ATTENZIONE: problema di eliminazione di un recipient da una lista di MailUP'
                );

            }
        }
    }

    /**
     * Delete a recipient from a list by Owner ID
     *
     * @param int $ownerId
     * @param MailUpRecipientTTL $recipientTTL
     *
     * @return null
     * @throws MailUPListException
     * @internal param $Mail
     *
     */
    public function deleteByOwnerId (
        int $ownerId,
        MailUpRecipientTTL $recipientTTL
    ) {

        // Get the entity manager
        $em = $this->getEntityManagerByOwnerId($ownerId);

        // Merge entity before delete (if entity was detached )
        $recipientTTL = $em->merge($recipientTTL);

        $tokenService = new MailUPTokenService();
        $token = $tokenService->getTokenByOwnerId($ownerId);
        try {
            $result = $this->authorizedApiCall (
                $ownerId,
                $token,
                self::CALL_TYPE_DELETE,
                sprintf(
                    '/API/v1.1/Rest/ConsoleService.svc/Console/List/%s/Unsubscribe/%s',
                    $recipientTTL->getList(),
                    $recipientTTL->getId()
                )
            );
        } catch (\Exception $e) {
            throw new MailUPListException($e);
        }

        // Delete entity
        $em->remove($recipientTTL);
        $em->flush();

        return $result;
    }

    /**
     * Add multiple recipients to a list by Owner ID
     *
     * @param int $ownerId
     * @param int $listId
     * @param array $recipients
     *
     * @throws MailUPListException
     * @throws MailUPRecipientException
     */
    public function addMultipleRecipientsToLGroupByOwnerId (
        int $ownerId,
        int $groupId,int $listId,
        array $recipients = []
    ) {
        if (empty($groupId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong GroupId ID"
            ));
        }

        // Normalize and filter all recipients
        $filteredRecipients = [];
        $expiringRecipients = [];
        foreach ($recipients as $recipientFields) {
            $email = '';
            $expireDate = null;
            $fields = [];
            foreach ($recipientFields as $field => $value) {
                if (!empty($value)) {
                    if (strtolower($field) == 'email') {
                        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
                            continue;
                        } else {
                            $email = $value;
                        }
                    } else if (strtolower($field) == 'expiredate') {
                        if (is_object($value) && get_class($value) == 'DateTime') {
                            $expireDate = $value;
                        }
                    } else {
                        $fields[] = [
                            'Description' => $field,
                            'Id' => count($fields) + 1,
                            'Value'  => $value
                        ];
                    }
                }
            }
            $filteredRecipients[] = [
                'Email' => $email,
                'Fields' => $fields
            ];
            if (!empty($email) &&
                !empty($expireDate)
            ) {
                $expiringRecipients[$email] = $expireDate;
            }
        }

        $tokenService = new MailUPTokenService();
        $token = $tokenService->getTokenByOwnerId($ownerId);
        try {
            $importId = $this->authorizedApiCall (
                $ownerId,
                $token,
                self::CALL_TYPE_POST,
                sprintf(
                    '/API/v1.1/Rest/ConsoleService.svc/Console/Group/%s/Recipients',
                    $groupId
                ),
                json_encode($filteredRecipients)
            );
        } catch (\Exception $e) {
            throw new MailUPListException($e);
        }
        sleep(2);
        $importProcessIsWorking = true;
        do {
            try {
                $importResponse = $this->authorizedApiCall (
                    $ownerId,
                    $token,
                    self::CALL_TYPE_GET,
                    sprintf(
                        '/API/v1.1/Rest/ConsoleService.svc/Console/Import/%s',
                        $importId
                    )
                );
                if (is_array($importResponse) &&
                    isset($importResponse['Completed']) &&
                    $importResponse['Completed'] == 'True'
                ) {
                    $importProcessIsWorking = false;
                } else {
                    sleep(5);
                }
            } catch (\Exception $e) {
                throw new MailUPListException($e);
            }
        } while ($importProcessIsWorking);

        // @todo read mail, match email and save ttl
        $allListRecipients = $this->getAllRecipientsFromAListByOwnerId(
            $ownerId,
            $listId
        );

        sleep(5);
        // Get the entity manager
        $em = $this->getEntityManagerByOwnerId($ownerId);
        foreach ($allListRecipients as $recipient) {
            if (isset($expiringRecipients[$recipient['Email']])) {

                print_r($recipient);
                $recipientId = $recipient['idRecipient'];
                $expireDate = $expiringRecipients[$recipient['Email']];


                $recipientTTL = $em->getRepository(MailUpRecipientTTL::class)
                    ->find([
                        'id' => $recipientId,
                        'list' => $listId
                    ]);

                if (is_null($recipientTTL)) {

                    // Save new entity
                    $recipientTTL = new MailUpRecipientTTL();
                    $recipientTTL->setId($recipientId)
                        ->setList($listId)
                        ->setCreated(new \DateTime('now'))
                        ->setExpire($expireDate);
                } else {

                    // Update entity
                    $recipientTTL->setUpdated(new \DateTime('now'))
                        ->setExpire($expireDate);
                }
                $em->persist($recipientTTL);

            }
        }
        $em->flush();

    }

}