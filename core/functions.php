<?php

function rootPath() : string {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $root = $protocol . $_SERVER['HTTP_HOST'] . '/EraaSoft/EraaSoft-Assignments-Ibrahim3zazy/';
    return $root;
}