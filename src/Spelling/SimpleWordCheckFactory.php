<?php


namespace MatrixWordFind\Spelling;


use MatrixWordFind\Config\SimpleConfig;
use Exception;
use RuntimeException;

class SimpleWordCheckFactory
{

    /**
     * @var SimpleConfig $config
     */
    private $config;

    /**
     * @return WordCheckInterface
     * @throws Exception
     */
    public function create(): WordCheckInterface
    {
        $dict = $this->loadDictionary();

        $simpleSpellCheck = new SimpleWordCheck();
        $simpleSpellCheck->setWordList($dict);

        return $simpleSpellCheck;
    }

    /**
     * @return string
     * @throws Exception
     */
    private function loadDictionary(): string
    {
        $dictPath = $this->config->getParam('dictionary_path', './data/words.txt');
        if (file_exists($dictPath)) {
            $dictRaw = file_get_contents($dictPath);
        } else {
            // todo: add custom exception
            throw new RuntimeException('Word file not found at ' . realpath($dictPath));
        }

        return $dictRaw;
    }

    /**
     * @param mixed $config
     * @return SimpleWordCheckFactory
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * Loads and prepares dictionary data.
     * @return array
     * @throws Exception
     */
    private function getDictionary()
    {
        $dictRaw = $this->loadDictionary();

        $dictRaw = strtoupper($dictRaw);
        $dict = explode("\n", $dictRaw);

        return $dict;
    }
}