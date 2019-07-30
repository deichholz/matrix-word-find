<?php


namespace MatrixWordFind\Spelling;


class SimpleWordCheck implements WordCheckInterface
{

    /**
     * @var array $words
     */
    private $words;

    public function __construct()
    {
        $this->words = [];
    }

    /**
     * @param $words
     * @return SimpleWordCheck
     */
    public function setWordList(array $words): SimpleWordCheck
    {
        $this->words = $words;

        return $this;
    }

    /**
     * Indicates whether provided string is a valid word.
     * @param $chars
     * @return bool
     */
    public function isValidWord($chars): bool
    {
        return in_array($chars, $this->words);
    }
}