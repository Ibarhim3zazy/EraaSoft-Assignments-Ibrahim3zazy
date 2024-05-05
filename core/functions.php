<?php

function rootPath() : string {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $root = $protocol . $_SERVER['HTTP_HOST'] . '/EraaSoft-Assignments-Ibrahim3zazy/';
    return $root;
}