<?php
use PHPUnit\Framework\TestCase;

class ProfileUpdateTest extends TestCase {
    public function testProfileUpdate() {
        $profile = ['name' => 'John', 'email' => 'john@example.com'];
        $updates = ['name' => 'Jane'];
        $profile = array_merge($profile, $updates);
        $this->assertEquals('Jane', $profile['name']);
        $this->assertEquals('john@example.com', $profile['email']);
    }
}
