<?php 

$hostName = 'localhost';
$userName = 'root';
$password = '';
$database = 'eraasoft_categories_task';

$conn = mysqli_connect($hostName, $userName, $password, $database);

if(!$conn) die("Error during database Connection");