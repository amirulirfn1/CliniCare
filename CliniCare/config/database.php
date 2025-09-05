<?php
require_once __DIR__ . '/../logger.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$name = getenv('DB_NAME');

try {
    $con = mysqli_connect($host, $user, $pass, $name);
} catch (mysqli_sql_exception $e) {
    getLogger()->error('Database connection failed: ' . $e->getMessage());
    die('Database connection error. Please try again later.');
}
