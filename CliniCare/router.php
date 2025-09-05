<?php
// Development router for PHP's built-in server to support extensionless URLs.
// Usage: php -S 127.0.0.1:8080 CliniCare/router.php

$docroot = __DIR__;
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/');

// Basic traversal protection
if (strpos($uri, '..') !== false) {
    http_response_code(400);
    exit('Bad request');
}

$path = $docroot . $uri;

// If the request exactly matches an existing file (asset or PHP), let the server handle it
if ($uri !== '/' && is_file($path)) {
    return false;
}

// Redirect .php to extensionless
if (preg_match('#^(.+)\.php$#i', $uri, $m)) {
    $target = $m[1];
    if (is_file($docroot . $uri)) {
        $qs = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? '?' . $_SERVER['QUERY_STRING'] : '';
        header('Location: ' . $target . $qs, true, 301);
        exit;
    }
}

// Directory requests: map to index.php
if (is_dir($path)) {
    $index = rtrim($path, '/\\') . DIRECTORY_SEPARATOR . 'index.php';
    if (is_file($index)) {
        require $index;
        exit;
    }
}

// Extensionless PHP file
if (is_file($path . '.php')) {
    require $path . '.php';
    exit;
}

// Fallback to root index.php
require $docroot . '/index.php';

