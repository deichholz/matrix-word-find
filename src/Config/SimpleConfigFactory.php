<?php


namespace MatrixWordFind\Config;

use \Exception;

class SimpleConfigFactory
{
    private $path;

    /**
     * @return mixed
     */
    private function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     * @return SimpleConfigFactory
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Build the Simple Config object from file at specified path.
     *
     * @return SimpleConfig
     * @throws Exception
     */
    public function create()
    {
        if (!is_file($this->getPath())) {
            throw new Exception(sprintf('File %s is not a valid file.', $this->getPath()));
        }

        $configData = json_decode(file_get_contents($this->getPath()), true);
        $config = new SimpleConfig();
        $config->addData($configData);

        return $config;
    }
}