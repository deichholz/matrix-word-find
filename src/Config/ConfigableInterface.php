<?php


namespace MatrixWordFind\Config;

/**
 * Indicates that this class supports setting a ConfigInterface object
 * Interface ConfigableInterface
 * @package App\Config
 */
interface ConfigableInterface
{
    /**
     * @param ConfigInterface $config
     */
    public function setConfig(ConfigInterface $config);

}