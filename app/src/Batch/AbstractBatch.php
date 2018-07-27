<?php

namespace App\Batch;


use Slim\Container;

class AbstractBatch{
    /** @var EntityManagerBuilder */
    protected $emBuilder;

    /**
     * @return EntityManagerBuilder
     */
    public function getEmBuilder(): EntityManagerBuilder {
        return $this->emBuilder;
    }

    /**
     * @return Container
     */
    public function getContainer(): Container {
        return $this->container;
    }
    /** @var Container */
    protected $container;

    /**
     * AbstractBatch constructor.
     * @param EntityManagerBuilder $emBuilder
     */
    public function __construct(EntityManagerBuilder $emBuilder, $container)
    {
        $this->emBuilder = $emBuilder;
        $this->container = $container;
    }


}
