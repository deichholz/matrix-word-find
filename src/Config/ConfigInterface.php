<?php

namespace MatrixWordFind\Config;

interface ConfigInterface
{
    /**
     * @param $name
     * @param null $default
     * @return mixed
     */
    public function getParam($name, $default = null);
}