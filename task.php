<?php

require_once(dirname(__DIR__) . '/Cli/Console.php');

try {
    array_shift($argv);
    $console = new Cli\Console($argv);
    $console->handle();
} catch (Exception $e) {
    echo 'Exception: ' . $e->getMessage();
    echo "\n";
    \Log::error(array(
        'Error on'  => $e->getFile() . $e->getLine(),
        'Error msg' => $e->getMessage(),
        'Trace'     => $e->getTraceAsString(),
    ));
}
