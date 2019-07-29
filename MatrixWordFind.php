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

    $parserFactory = new MatrixWordFind\Matrix\MatrixParserFactory($config);
    $parser = $parserFactory->create();

    var_dump($config, $parser);
    printf("\nProcess completed successfully.\n\n");
} catch (Throwable $e) {
    printf("\nException: \n%s. \nProcess did not complete successfully.\n\n", $e->getMessage());
}
exit();