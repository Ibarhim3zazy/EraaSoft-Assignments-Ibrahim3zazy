<?php 

function showErrors($inputname) {
    if (file_exists('user/contact-errors.json')) {
        $signupErrors = file_get_contents('user/contact-errors.json');
        $signupErrors = json_decode($signupErrors, true);
        if (!empty($signupErrors[$inputname])) foreach ($signupErrors[$inputname] as $value) return $value ."<br>" ?? null;
    }
}
function tmpMessageData($inputname) {
    if (file_exists('user/contact-data-tmp.json')) {
        $messageData = file_get_contents('user/contact-data-tmp.json');
        $messageData = json_decode($messageData, true);
        return $messageData[$inputname];
    }
}