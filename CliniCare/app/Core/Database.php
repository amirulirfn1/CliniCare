<?php
class Database {
    private static $connection = null;

    public static function getConnection() {
        if (self::$connection === null) {
            self::$connection = mysqli_connect("localhost", "clinicarecustomer", "customer", "clinicare");
            if (!self::$connection) {
                die('Connection failed: ' . mysqli_connect_error());
            }
            register_shutdown_function([self::class, 'closeConnection']);
        }
        return self::$connection;
    }

    public static function closeConnection() {
        if (self::$connection !== null) {
            mysqli_close(self::$connection);
            self::$connection = null;
        }
    }
}
?>
