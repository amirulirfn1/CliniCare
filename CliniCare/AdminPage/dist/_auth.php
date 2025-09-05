<?php
// Admin authorization gate. Include near the top of admin pages.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    header("Location: ../../index.php");
    exit;
}

// Ensure we know the usertype
if (!isset($_SESSION['usertype'])) {
    require_once __DIR__ . '/../db_conn.php';
    if (isset($con)) {
        $email = $_SESSION['email'];
        $stmt = $con->prepare("SELECT usertype FROM user WHERE email = ?");
        if ($stmt) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($res && $row = $res->fetch_assoc()) {
                $_SESSION['usertype'] = $row['usertype'];
            }
        }
    }
}

$allowed = ['admin', 'staff'];
if (!isset($_SESSION['usertype']) || !in_array($_SESSION['usertype'], $allowed, true)) {
    header("Location: ../../index.php");
    exit;
}

