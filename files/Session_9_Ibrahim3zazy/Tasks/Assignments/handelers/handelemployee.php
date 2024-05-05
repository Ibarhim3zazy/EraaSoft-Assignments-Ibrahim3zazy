<?php 
if (!isset($_SESSION)) session_start();
include '../core/functions.php';
require '../classes/Validations.php';
require '../classes/Session.php';
require '../classes/DBEmployee.php';
// include_once './database/Database.php';
if (checkPostRequestInput('name')) {
    foreach($_POST as $key => $value) $$key = sanitizeInput($value);

    $departments = ['it', 'cs', 'sc', 'back-end'];

    $errors['name'][] = Validations::requireVal($name);
    $errors['name'][] = Validations::minVal('name', $name, 2);
    $errors['name'][] = Validations::maxVal('name', $name, 30);

    $errors['department'][] = Validations::requireVal($department);
    $errors['department'][] = Validations::maxVal('department', $department, 30);
    if(!in_array(strtolower($department), $departments)) $errors['department'][] = 'employee department not found';

    $errors['email'][] = Validations::requireVal($email);
    $errors['email'][] = Validations::minVal('email', $email, 5);
    $errors['email'][] = Validations::maxVal('email', $email, 255);
    $errors['email'][] = Validations::emailVal($email);

    $errors['password'][] = Validations::requireVal($password);
    $errors['password'][] = Validations::minVal('password', $password, 2);
    $errors['password'][] = Validations::maxVal('password', $password, 50);

    foreach ($errors as $key => $value) {
        $errors[$key] = array_filter($value);
        if ($errors[$key] == null) {
            unset($errors[$key]);
        }
    }

    if (empty($errors)) {
        if (checkPostRequestInput('employeeId')) {
            DBEmployee::updateEmployee($employeeId, $name, $email, $department, $password);
        }else {
            DBEmployee::createEmployee($name, $email, $department, $password);
        }
        header('location: ../employees.php');
        die;
    } else {
        Session::setSession('errors', $errors);
        header('location: ../add-employee.php');
        die;
    }
}elseif (checkGetRequestInput('categoryIdDel')) {
    $categoryIdDel = $_GET['categoryIdDel'];
    $query = "DELETE FROM `new_category` WHERE `id` = '$categoryIdDel'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    header('location: ../employees.php');
    die;
}else {
    echo 'Not Supported Method Or Wrong Category Name';
}