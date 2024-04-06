<?php

foreach(glob("*.html") as $fileFullName) {
    $fileName = substr($fileFullName, 0, strrpos($fileFullName, "."));
    rename($fileFullName, $fileName . ".php");
    // unlink("test.json");
}