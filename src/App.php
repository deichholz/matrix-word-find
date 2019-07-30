<?php

namespace MatrixWordFind;

use MatrixWordFind\Config\SimpleConfigFactory,
    MatrixWordFind\Spelling\SimpleWordCheckFactory,
    MatrixWordFind\Matrix\MatrixParserFactory,
    MatrixWordFind\Strings\StringParserFactory,
    MatrixWordFind\Matrix\MatrixParser;

class App
{
    /**
     * @var MatrixParserFactory $matrixFactory
     */
    private $matrixFactory;

    /**
     * @var StringParserFactory $stringParserFactory
     */
    private $stringParserFactory;

    public function run()
    {
        try {
            $this->initialize();

            $matrix = $this->matrixFactory->create();
            $parser = $this->stringParserFactory->create();
            $words = $parser->getWordsFromMatrix($matrix);

            $this->displaySuccess($matrix, $words);
        }
        catch (Throwable $e) {
            $this->displayException($e);
        }
        exit(0);
    }

    /**
     * Creates all necessary dependencies.
     * @throws Exception
     */
    private function initialize(): void
    {
        // todo: refactor into standard DI manager.

        $simpleConfigFactory = new SimpleConfigFactory();
        $config = $simpleConfigFactory
            ->setPath(__DIR__ . "/config.json")
            ->create();

        $wordCheckFactory = new SimpleWordCheckFactory();
        $wordCheckFactory->setConfig($config);

        $this->matrixFactory = new MatrixParserFactory();
        $this->matrixFactory->setConfig($config);

        $this->stringParserFactory = new StringParserFactory();
        $this->stringParserFactory
            ->setConfig($config)
            ->setWordChecker($wordCheckFactory->create());
    }

    /**
     * @param MatrixParser $matrix
     * @param array $words
     */
    private function displaySuccess(MatrixParser $matrix, array $words): void
    {
        printf("\n\n******* The Matrix ********.\n\n");
        echo $matrix->getMatrixAsStrings();

        printf("\n\n******* The Words ********.\n\n");
        foreach ($words as $row => $word) {
            echo $row + 1 . " $word\n";
        }
        printf("\n\nProcess completed successfully.\n\n");
    }

    /**
     * @param Throwable $e
     */
    private function displayException(Throwable $e): void
    {
        printf("\nException: \n%s. \nProcess did not complete successfully.\n\n", $e->getMessage());
    }
}
