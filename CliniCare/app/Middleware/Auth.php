<?php
class Auth
{
    public static function requireRole(string $role, string $redirect = '../../index.php')
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['email']) || !isset($_SESSION['role']) || $_SESSION['role'] !== $role) {
            header("Location: $redirect");
            exit;
        }
    }
}
