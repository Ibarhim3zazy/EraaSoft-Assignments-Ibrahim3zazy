<?php 
if(!isset($_SESSION)) session_start();

function isUserExist($getUserData = false, $userId = null, $register = false){
    if ((isset($_POST['email']) && isset($_POST['password'])) || !is_null($userId)) {
        require_once('errorHandeling/validationInput.php');
        if (is_null($userId)) {
            $email = sanitizeInput($_POST['email']);
            $password = sanitizeInput($_POST['password']);
        }
        $userData = file_get_contents('user/user-data.json');
        $userDataArrays = json_decode($userData, true);
        foreach($userDataArrays as $userDataArray) { 
            if (is_null($userId) && (trim(strtolower($userDataArray['email'])) == trim(strtolower($email)))) {
                if ($register) return 'email is exist';
                $hashPass = substr($userDataArray['password'], 0, strrpos($userDataArray['password'], "i3"));
                if(sha1($password) == $hashPass) {
                    // if ($isAdmin) return $_SESSION['userDataAdmin'] = $userDataArray;
                    if ($getUserData) return $_SESSION['userData'] = $userDataArray;
                    break;
                }
            }elseif ($userDataArray['id'] == $userId) {
                return $_SESSION['getUserDataBYId'] = $userDataArray;
            }
        }
        return header('location: ' . filePath('login.php'));
    }
}

function isSignedIn($signedIn = true, $userId = null) {
    if (isset($_SESSION['userData'])) {
        if (!$signedIn) header('location: ' . filePath('index.php'));
    }elseif (is_null($userId)) {
        if ($signedIn) header('location: ' . filePath('login.php?userData=invalid'));
    }
    // elseif (!is_null($userId) && !isUserExist($userId)) {
        
    // }
}

function filePath($path) {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $root = $protocol . $_SERVER['HTTP_HOST'] . '\EraaSoft-Assignments-Ibrahim3zazy\files\Session_7_Ibrahim3zazy\Tasks\Assignments';
    return $root . '/' . $path;
}

function logOut() {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['logout'])) {
            session_unset();
            session_destroy();
        }
    }
}

function getMessages($userId){
    if (isset($_SESSION['userData'])) {
        $allMessagesData = [];
        $messagesData = file_get_contents('user/contact-data.json');
        $messagesDataArrays = json_decode($messagesData, true);
        foreach($messagesDataArrays as $messagesDataArray) { 
            if ($messagesDataArray['userId'] == $userId) {
                $allMessagesData[] = $messagesDataArray;
            }
        }
        $_SESSION['messagesData'] = $allMessagesData;
    }
        return 'You have not any messages';
}