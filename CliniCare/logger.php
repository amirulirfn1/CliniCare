<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

function getLogger(): Logger {
    static $logger = null;
    if ($logger === null) {
        $logger = new Logger('app');
        $logDir = __DIR__ . '/../logs';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }
        $logger->pushHandler(new StreamHandler($logDir . '/app.log', Logger::DEBUG));
    }
    return $logger;
}
