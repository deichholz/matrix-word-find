<?php


require "vendor/autoload.php";

// todo: add support for PHP Env
$documentRoot = __DIR__;
error_reporting(E_ALL);

printf("Trying...\n");
try {
    $configFactory = new MatrixWordFind\Config\SimpleConfigFactory();
    $config = $configFactory
        ->setPath($documentRoot . "/config.json")
        ->create();

    $wordCheckFactory = new MatrixWordFind\Spelling\SimpleWordCheckFactory();
    $wordCheckFactory->setConfig($config);

    $matrixFactory = new MatrixWordFind\Matrix\MatrixParserFactory($config);
    $matrix = $matrixFactory->create();

    var_dump(file_get_contents('./matrix_data.txt'), $parser->getRowCollStrings());
    printf("\nProcess completed successfully.\n\n");
} catch (Throwable $e) {
    printf("\nException: \n%s. \nProcess did not complete successfully.\n\n", $e->getMessage());
}
exit();