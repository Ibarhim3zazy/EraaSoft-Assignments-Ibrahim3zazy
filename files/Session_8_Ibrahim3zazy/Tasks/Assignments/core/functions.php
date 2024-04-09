<?php 

function checkRequestInput($methodName, $inputName) {
    if ($_SERVER['REQUEST_METHOD'] == $methodName) {
        return isset($_POST[$inputName]) ? true : false;
    }else {
        return false;
    }
}

function filePath($path) {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $root = $protocol . $_SERVER['HTTP_HOST'] . '\EraaSoft-Assignments-Ibrahim3zazy\files\Session_8_Ibrahim3zazy\Tasks\Assignments';
    return $root . '/' . $path;
}

function sanitizeInput($input)
{
    return trim(htmlspecialchars(htmlentities(stripslashes($input))));
}