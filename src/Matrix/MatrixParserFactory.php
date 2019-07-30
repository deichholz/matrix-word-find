<?php

namespace MatrixWordFind\Matrix;

use Exception,
    MatrixWordFind\Config\ConfigInterface;

class MatrixParserFactory
{
    /**
     * @var string $path
     */
    private $path;

    /**
     * @var ConfigInterface $config
     */
    private $config;

    /**
     * @param ConfigInterface $config
     * @return MatrixParserFactory
     */
    public function setConfig(ConfigInterface $config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return MatrixParser
     * @throws Exception
     */
    public function create()
    {
        if (!is_file($this->getPath())) {
            throw new Exception(sprintf('File %s is not a valid file.', $this->getPath()));
        }

        $data = file_get_contents($this->getPath());
        $parser = new MatrixParser();
        $parser->setMatrixFromString($data);

        return $parser;
    }

    /**
     * Get config option for matrix data file.
     * @return string
     */
    private function getPath()
    {
        if (!isset($this->path)) {
            $this->path = (string)$this->config->getParam('matrix-data-file', './data/matrix.txt');
        }
        return $this->path;
    }

}