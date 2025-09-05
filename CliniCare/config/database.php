<?php
// Database connection using environment variables.
// Loads Dotenv from CliniCare/.env if available.

// Try to load Composer autoload (for Dotenv)
$autoload = dirname(__DIR__, 2) . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require_once $autoload;
}

// Load .env if Dotenv is available and .env exists under CliniCare/
if (class_exists('Dotenv\\Dotenv')) {
    $envDir = dirname(__DIR__); // CliniCare
    $envPath = $envDir . '/.env';
    if (file_exists($envPath)) {
        if (!defined('CLINICARE_DOTENV_LOADED')) {
            $dotenv = Dotenv\Dotenv::createImmutable($envDir);
            $dotenv->safeLoad();
            define('CLINICARE_DOTENV_LOADED', true);
        }
    }
}

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$name = getenv('DB_NAME');

$con = mysqli_connect($host, $user, $pass, $name);

if (!$con) {
    // Avoid exposing internals to users; production should log this instead.
    die('Database connection failed.');
}
