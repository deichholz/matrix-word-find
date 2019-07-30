<?php


namespace MatrixWordFind\Config;

use \Exception;

class SimpleConfig implements ConfigInterface
{
    private $config;

    /**
     * SimpleConfig constructor.
     */
    public function __construct()
    {
        $this->config = [];
    }

    /**
     * Get Parameter from inside of config.
     * @param $name
     * @param null $default
     * @return mixed|null
     * @throws Exception
     */
    public function getParam($name, $default = null)
    {
        return $this->config[$name] ?? $default;
    }

    /**
     * @param array $config
     * @return SimpleConfig
     */
    public function addData(array $config)
    {
        $this->config = array_intersect_key($this->config, $config);
        return $this;
    }

}