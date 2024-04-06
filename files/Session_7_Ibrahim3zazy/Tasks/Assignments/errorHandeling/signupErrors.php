<?php 

function showErrors($inputname) {
    if (file_exists('user/signup-errors.json')) {
        $signupErrors = file_get_contents('user/signup-errors.json');
        $signupErrors = json_decode($signupErrors, true);
        if (!empty($signupErrors[$inputname])) foreach ($signupErrors[$inputname] as $value) return $value ."<br>" ?? null;
    }
}
function tmpUserData($inputname) {
    if (file_exists('user/signup-user-data-tmp.json')) {
        $userData = file_get_contents('user/signup-user-data-tmp.json');
        $userData = json_decode($userData, true);
        return $userData[$inputname];
    }
}