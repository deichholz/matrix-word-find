<?php


namespace MatrixWordFind\Strings;

use MatrixWordFind\Matrix\MatrixParser;

class StringParser
{
    const VOWELS = 'aeiouy';

    private $maxWordLength;
    private $minWordLength;
    private $wordChecker;

    public function __construct()
    {
        // fewer than 5% of english words exceed 13 characters
        $this->maxWordLength = 13;
        $this->minWordLength = 4;
    }


    public function getWordsFromMatrix(MatrixParser $matrix)
    {
        $foundWords = [];
        // get raw strings from matrix (horizontal and vertical)
        $possibleWordRoots = $matrix->getRowCollStrings();
        foreach ($possibleWordRoots as $possibleWordRoot) {
            // process each string forwards and backwards to get valid words.
            $foundWords = array_merge(
                $foundWords,
                $this->getWordsLeftTrim($possibleWordRoot),
                $this->getWordsLeftTrim(strrev($possibleWordRoot))
            );
        }

        $foundWords = array_filter($foundWords);
        return $foundWords;
    }

    /**
     * Evaluate possible words within string by eliminating characters from left and right
     * @param $string
     * @return array
     */
    private function getWordsLeftTrim($string)
    {
        $foundWords = [];
        $length = strlen($string);
        for ($start = 0; $start < $length; $start++) {
            $possible = substr($string, $start);
            // remove chars from right side to identify word.
            $validWord = $this->getWordsRightTrim($possible);
            if (!empty($validWord)) {
                // move forward to end of word to skip sub-words
                $start += strlen($validWord) - 2;
                $foundWords[] = $validWord;
            }
        }

        return $foundWords;
    }

    /**
     * @param $string
     * @return string | null
     */
    private function getWordsRightTrim($string): ?string
    {
        // truncate excessively long strings
        $string = substr($string, 0, $this->maxWordLength);

        while ($this->isWordLike($string)) {
            if ($this->getWordChecker()->isValidWord($string)) {
                return $string;
            } else {
                $string = substr($string, 0, -1);
            }
        }

        return null;
    }

    /**
     * Check to see if string matches basic metrics to be a word.
     *
     * @param $string
     * @return bool
     */
    private function isWordLike($string): bool
    {
        return (false !== strpbrk($string, self::VOWELS)) || (strlen($string) >= 4);
    }

    /**
     * @return mixed
     */
    private function getWordChecker()
    {
        return $this->wordChecker;
    }

    /**
     * @param mixed $wordChecker
     * @return StringParser
     */
    public function setWordChecker($wordChecker)
    {
        $this->wordChecker = $wordChecker;
        return $this;
    }

    /**
     * @param int $maxWordLength
     * @return StringParser
     */
    public function setMaxWordLength(int $maxWordLength): StringParser
    {
        $this->maxWordLength = $maxWordLength;
        return $this;
    }

    /**
     * @param int $minWordLength
     * @return StringParser
     */
    public function setMinWordLength(int $minWordLength): StringParser
    {
        $this->minWordLength = $minWordLength;
        return $this;
    }


}