<?php

// todo: add support for .env
error_reporting(E_ALL & ~E_NOTICE);
require "vendor/autoload.php";

$app = new MatrixWordFind\App();
$app->run();