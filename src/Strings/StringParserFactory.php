<?php


namespace MatrixWordFind\Strings;

use MatrixWordFind\Spelling\WordCheckInterface;
use MatrixWordFind\Strings\StringParser;

class StringParserFactory
{
    private $config;

    private $wordChecker;

    /**
     * @param mixed $config
     * @return StringParserFactory
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @param mixed $wordChecker
     * @return StringParserFactory
     */
    public function setWordChecker(WordCheckInterface $wordChecker)
    {
        $this->wordChecker = $wordChecker;
        return $this;
    }

    public function create(): stringParser
    {
        $stringParser = new StringParser();
        $stringParser->setWordChecker($this->wordChecker);

        return $stringParser;
    }

}