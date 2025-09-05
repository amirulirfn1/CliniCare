<?php
// Centralized mail configuration using environment variables.
// Loads Dotenv from CliniCare/.env if available.

// Try to load Composer autoload to enable Dotenv if present
$autoload = dirname(__DIR__, 2) . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require_once $autoload;
}

// Load .env if Dotenv is available and .env exists under CliniCare/
if (class_exists('Dotenv\\Dotenv')) {
    $envDir = dirname(__DIR__); // CliniCare
    $envPath = $envDir . '/.env';
    if (file_exists($envPath)) {
        // Avoid loading multiple times
        if (!defined('CLINICARE_DOTENV_LOADED')) {
            $dotenv = Dotenv\Dotenv::createImmutable($envDir);
            $dotenv->safeLoad();
            define('CLINICARE_DOTENV_LOADED', true);
        }
    }
}

$phpMailerLoaded = class_exists('PHPMailer\\PHPMailer\\PHPMailer');
if (!$phpMailerLoaded) {
    // Fallback to bundled PHPMailer if composer is not installed
    $base = dirname(__DIR__) . '/Customer/PHPMailer/src/';
    if (file_exists($base . 'PHPMailer.php')) {
        require_once $base . 'Exception.php';
        require_once $base . 'PHPMailer.php';
        require_once $base . 'SMTP.php';
    }
}

$mailConfig = [
    'host'   => getenv('SMTP_HOST') ?: '',
    'user'   => getenv('SMTP_USER') ?: '',
    'pass'   => getenv('SMTP_PASS') ?: '',
    'port'   => getenv('SMTP_PORT') ?: '465',
    'secure' => getenv('SMTP_SECURE') ?: 'ssl', // ssl or tls
    'from'   => getenv('SMTP_FROM') ?: (getenv('SMTP_USER') ?: ''),
    'from_name' => getenv('SMTP_FROM_NAME') ?: 'CliniCare',
];

// Helper to assert SMTP is configured
function clinicare_smtp_configured(array $cfg): bool
{
    return !empty($cfg['host']) && !empty($cfg['user']) && !empty($cfg['pass']);
}
