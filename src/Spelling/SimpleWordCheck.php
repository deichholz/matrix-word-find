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
     * @param $string
     * @return bool
     */
    public function isValidWord($string): bool
    {
        $isValid = in_array($string, $this->words);
        printf("Testing: %s is %s\n", $string, $isValid ? 'CORRECT' : '');

        return $isValid;
    }
}