<?php

require_once __DIR__ . '/Database.php';

class DBEmployee
{
    public static function createEmployee($name, $email, $department, $password) {
        $db = new Database;
        $sql = "INSERT INTO `employees` (`id`, `name`, `email`, `department`, `password`, `created_at`) 
        VALUES ('NULL', '$name', '$email', '$department', '$password', 'NULL');";
        $db->makeQuery($sql);
    }

    public static function updateEmployee($employeeId, $name, $email, $department, $password) {
        $db = new Database;
        $sql = "UPDATE `employees` SET `name` = '$name', `email` = '$email', `department` = '$department', `password` = '$password'
        WHERE `id` = '$employeeId';";
        $db->makeQuery($sql);
    }

    public static function viewSpesificEmployee($employeeId) {
        $db = new Database;
        $sql = "SELECT * FROM `employees`
        WHERE `id` LIKE '$employeeId';";
        $response = $db->makeQuery($sql);
        return $response->fetch_all(MYSQLI_ASSOC);
    }
}