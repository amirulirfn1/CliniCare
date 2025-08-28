<?php
session_start();

require_once __DIR__ . '/../CliniCare/AdminPage/db_conn.php';
require_once __DIR__ . '/../app/Models/AdminModel.php';
require_once __DIR__ . '/../app/Controllers/AdminController.php';

use App\Models\AdminModel;
use App\Controllers\AdminController;

$model = new AdminModel($con);
$controller = new AdminController($model);

if (isset($_POST['updateProfileAdmin'])) {
    $controller->updateProfileAdmin($_SESSION['email'] ?? '', $_POST);
} elseif (isset($_POST['deleteCustomer'])) {
    $controller->deleteCustomer($_POST['emailToDelete'] ?? '');
} else {
    require __DIR__ . '/../app/Views/profile.php';
}
