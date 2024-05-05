<?php 

class Validations
{
    public static function requireVal($input) {
        return empty($input) ? 'required' : null;
    }

    public static function minVal($inputName, $string, $length) {
        return (strlen($string) <= $length) ? "employee $inputName length must be bigger than $length chars" : null;
    }

    public static function maxVal($inputName, $string, $length) {
        return (strlen($string) > $length) ? "employee $inputName length must be lower than $length chars" : null;
    }
    
    public static function emailVal($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return !filter_var($email, FILTER_VALIDATE_EMAIL) ? 'Please enter an correct email' : null;
    }
}
