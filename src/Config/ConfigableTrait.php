<?php


namespace MatrixWordFind\Config;

/**
 * Ensures that any object containing this trait can accept an object of type ConfigInterface.
 */
trait ConfigableTrait
{
    public $config;

    /**
     * @param ConfigInterface $config
     */
    public function setConfig(ConfigInterface $config)
    {
        $this->config = $config;
    }
}