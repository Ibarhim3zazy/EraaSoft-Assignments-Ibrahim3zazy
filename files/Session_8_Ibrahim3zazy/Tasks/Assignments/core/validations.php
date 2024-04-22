<?php 

function requireVal($input) {
    return empty($input) ? false : true;
}
function minVal($input, $length) {
    return (strlen($input) < $length) ? false : true;
}
function maxVal($input, $length) {
    return (strlen($input) > $length) ? false : true;
}

// function emailVal($email) {
//     return !filter_var($email, FILTER_VALIDATE_EMAIL) ? false : true;
// }