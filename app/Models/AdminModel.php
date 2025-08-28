<?php
namespace App\Models;

class AdminModel
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function updateProfile(string $email, array $data): bool
    {
        $name = $data['name'] ?? '';
        $phoneNumber = $data['phoneNumber'] ?? '';
        $icNumber = $data['icNumber'] ?? '';
        $birthDate = $data['birthDate'] ?? '';
        $address = $data['address'] ?? '';

        $sql = "UPDATE customer SET name = '$name', address = '$address', phoneNumber = '$phoneNumber'," .
               " icNumber = '$icNumber', birthDate = '$birthDate' WHERE email = '$email'";

        return $this->con->query($sql) === TRUE;
    }

    public function deleteCustomer(string $email): bool
    {
        $sql = "DELETE FROM customer WHERE email = '$email'";
        if ($this->con->query($sql) === TRUE) {
            $sql2 = "DELETE FROM user WHERE email = '$email'";
            if ($this->con->query($sql2) === TRUE) {
                return true;
            }
        }
        return false;
    }
}
