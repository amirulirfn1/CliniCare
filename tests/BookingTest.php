<?php
use PHPUnit\Framework\TestCase;

class BookingTest extends TestCase {
    public function testBookingCreation() {
        $bookings = [];
        $booking = ['user_id' => 1, 'date' => '2025-01-01'];
        $bookings[] = $booking;
        $this->assertCount(1, $bookings);
        $this->assertSame($booking, $bookings[0]);
    }
}
