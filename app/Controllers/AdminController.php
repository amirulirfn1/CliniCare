<?php
namespace App\Controllers;

use App\Models\AdminModel;

class AdminController
{
    private $model;

    public function __construct(AdminModel $model)
    {
        $this->model = $model;
    }

    public function updateProfileAdmin(string $email, array $data): void
    {
        if ($this->model->updateProfile($email, $data)) {
            require __DIR__ . '/../Views/profile.php';
        } else {
            echo 'error';
        }
    }

    public function deleteCustomer(string $email): void
    {
        if ($this->model->deleteCustomer($email)) {
            require __DIR__ . '/../Views/customerList.php';
        } else {
            echo 'error';
        }
    }
}
