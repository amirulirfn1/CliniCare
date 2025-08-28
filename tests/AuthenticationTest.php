<?php
use PHPUnit\Framework\TestCase;

class AuthenticationTest extends TestCase {
    public function testValidCredentials() {
        $users = ['user@example.com' => password_hash('secret', PASSWORD_DEFAULT)];
        $this->assertTrue(password_verify('secret', $users['user@example.com']));
    }

    public function testInvalidCredentials() {
        $users = ['user@example.com' => password_hash('secret', PASSWORD_DEFAULT)];
        $this->assertFalse(password_verify('wrong', $users['user@example.com']));
    }
}
