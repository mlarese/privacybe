<?php

namespace App\Batch;


class AbstractBatch{
    protected $emBuilder;
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
