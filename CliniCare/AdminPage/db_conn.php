<?php

require_once __DIR__ . '/../logger.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $con = mysqli_connect("localhost", "clinicarecustomer", "customer", "clinicare");
    // $con = mysqli_connect("localhost", "clinicar_user", "clinicare123", "clinicar_clinicare");
} catch (mysqli_sql_exception $e) {
    getLogger()->error('Database connection failed: ' . $e->getMessage());
    die('Database connection error. Please try again later.');
}
