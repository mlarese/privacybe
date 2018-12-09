<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 17/05/2018
 * Time: 10:55
 */

namespace GDPR\Resource;


use GDPR\Entity\Config\Properties;

class PropertiesResource extends AbstractResource {
    /**
     * @return mixed
     * @throws PropertyNotFoundException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function languages () {
        return $this->findBy('languages');
    }

    /**
     * @return mixed
     * @throws PropertyNotFoundException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function widgetScrollText () {
        return $this->findBy('widget_scroll_text');
    }

    /**
     * @return mixed
     * @throws PropertyNotFoundException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function widgetSendRequestText () {
        return $this->findBy('widget_send_request_text');
    }

    /**
     * @return mixed
     * @throws PropertyNotFoundException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function widgetSendRequestSuccessText () {
        return $this->findBy('widget_send_request_success_text');
    }

    /**
     * @return mixed
     * @throws PropertyNotFoundException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function widgetSendCaptionText () {
        return $this->findBy('widget_send_caption_text');
    }
    /**
     * @param $propertyName
     *
     * @return mixed
     * @throws PropertyNotFoundException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    protected function findBy($propertyName) {
        /** @var Properties $property */
        $property = $this->entityManager->find(Properties::class, $propertyName) ;
        $data = $property->getData();
        if(!isset($property)) {
            throw new PropertyNotFoundException("Property $propertyName not found");
        }

        return $data[$propertyName] ;
    }
}
