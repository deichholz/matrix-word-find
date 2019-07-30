<?php


namespace MatrixWordFind\Matrix;

class MatrixParser
{
    private $matrix = [];

    /**
     * Initializes the internal matrix from a string.
     * @param $matrixString
     * @return $this
     */
    public function setMatrixFromString($matrixString)
    {
        $this->setMatrix($this->convertStringToMatrix($matrixString));
        return $this;
    }

    /**
     * @param $matrixString
     * @return MatrixParser
     */
    public function setMatrix(array $matrixString): MatrixParser
    {
        $this->matrix = $matrixString;
        return $this;
    }

    /**
     * Converts a linefeed delimited string into a 2 dimensional array where the values
     * correspond to each letter in the string.
     * @param $string
     * @return array
     */
    private function convertStringToMatrix($string): array
    {
        // clean up string
        $string = str_replace("\r\n", "\n", $string);
        $string = trim($string, "\n");

        // convert string to two dimensional matrix.
        $matrixRows = explode("\n", $string);
        $matrixRows = array_map('str_split', $matrixRows);

        return $matrixRows;
    }

    public function getRowCollStrings(): array
    {
        return array_merge(
            $this->getHorizontalStrings($this->matrix),
            $this->getHorizontalStrings($this->transposeArray($this->matrix))
        );
    }

    /**
     * Converts all horizontal rows in matrix to strings
     * @return string[]
     */
    private function getHorizontalStrings($matrix): array
    {
        return array_map('implode', $matrix);
    }

    /**
     * Converts all horizontal rows in matrix to strings
     * @return string[]
     */
    private function transposeArray(array $original): array
    {
        return array_map(null, ...$original);
    }

    public function getMatrixAsStrings()
    {
        $matrix = '';
        foreach ($this->matrix as $line) {
            $matrix .= implode(' ', $line) . PHP_EOL;
        }

        return $matrix;
    }
}