<?php 
if (!isset($_SESSION)) session_start();

function checkPostRequestInput($inputName) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return (isset($_POST[$inputName])) ? $_POST[$inputName] : false;
    }else {
        return false;
    }
}

function checkGetRequestInput($inputName) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        return (isset($_GET[$inputName])) ? $_GET[$inputName] : false;
    }else {
        return false;
    }
}

function filePath($path) {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $root = $protocol . $_SERVER['HTTP_HOST'] . '.\EraaSoft-Assignments-Ibrahim3zazy\files\Session_8_Ibrahim3zazy\Tasks\Assignments';
    return $root . '/' . $path;
}

function sanitizeInput($input)
{
    return trim(htmlspecialchars(htmlentities(stripslashes($input))));
}