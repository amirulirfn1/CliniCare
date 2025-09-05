<?php
// Script to migrate existing MD5 hashed passwords to password_hash.
// This will hash the current MD5 values so that sign-in can verify using password_verify.

include 'db_conn.php';

if (!$con) {
    die('Database connection failed');
}

$query = mysqli_query($con, "SELECT email, password FROM customer");
while ($row = mysqli_fetch_assoc($query)) {
    $email = $row['email'];
    $current = $row['password'];

    // Detect legacy MD5 hashes (32 hex characters)
    if (strlen($current) === 32 && ctype_xdigit($current)) {
        $newHash = password_hash($current, PASSWORD_DEFAULT);
        mysqli_query($con, "UPDATE customer SET password='$newHash' WHERE email='$email'");
    }
}

echo "Password migration complete\n";
