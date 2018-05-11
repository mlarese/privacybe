<?php
namespace App;

use App\Resource\MandatoryFieldMissingException;
use Doctrine\ORM\EntityManager;
use Exception;

abstract class AbstractResource
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager = null;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}
