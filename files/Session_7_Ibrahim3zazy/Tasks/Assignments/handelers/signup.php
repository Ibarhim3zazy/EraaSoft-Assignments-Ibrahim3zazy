<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<?php

require_once('../handelers/functions.php');
require_once(filePath('errorHandeling/validationInput.php'));

$userData = file_get_contents('../user/user-data.json');
$userDataArray = json_decode($userData, true);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userData = file_get_contents('../user/user-data.json');
    $userDataArrays = json_decode($userData, true);
    foreach($userDataArrays as $userDataArray) { 
        if($_POST['email'] == $userDataArray['email']) {
            echo <<<'done'
            <div class="container mt-5  alert alert-warning" role="alert">
                <h4 class="alert-heading">Sorry!</h4>
                <p>This email is already registered</p>
                <hr>
                <p class="mb-0">You will be redirected to sign-in page to log you in. in 10 seconds</p>
            </div>
            done;
            header('refresh: 10;url = ../login.php');
            die;
        }
    }
    
    $userId = rand();
    $password = sha1($_POST['password']) . "i3" . $userId;
    $userData = [
         "firstName" => $_POST['firstName'],
         "lastName" => $_POST['lastName'],
         "userName" => $_POST['userName'],
         "email" => $_POST['email'],
         "phoneNum" => $_POST['phoneNum'],
         "password" => $password,
         "terms" => $_POST['terms']
        ];


    $errors = [];

        foreach($_POST as $key => $value) $$key = sanitizeInput($value);

        if(empty($firstName)) $errors["FirstNameErrors"][] = 'Name field is required';
        if(strlen($firstName) < 3 || strlen($firstName) > 10) $errors["FirstNameErrors"][] = 'Name value must be among 3 and 10 characters';

        if(empty($lastName)) $errors["LastNameErrors"][] = 'Name field is required';
        if(strlen($lastName) < 3 || strlen($lastName) > 10) $errors["LastNameErrors"][] = 'Name value must be among 3 and 10 characters';

        if(empty($userName)) $errors["UserNameErrors"][] = 'Name field is required';
        if(strlen($userName) < 3 || strlen($userName) > 10) $errors["UserNameErrors"][] = 'Name value must be among 3 and 10 characters';
        
        if(empty($email)) $errors["EmailErrors"][] = 'Email field is required';

        if(empty($phoneNum)) $errors["PhoneErrors"][] = 'phone field is required';
        if(is_int($phoneNum)) $errors["PhoneErrors"][] = 'Phone number value must be numbers (integer)';
        if(strlen($phoneNum) !== 11) $errors["PhoneErrors"][] = 'Phone number value must be 11 numbers';


        if(empty($password)) $errors["PasswordErrors"][] = 'password field is required';
        if(strlen($password) < 3 || strlen($password) > 20) $errors["PasswordErrors"][] = 'password value must be among 3 and 20 characters';

        // (TASK) validate age is requried and should be numeric


        if(empty($errors)) {
            // there're no errors
        ?>
            <div class="container mt-5">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Aww yeah, you successfully signed up.</p><hr>
                    <p class="mb-0">Name: <?= $_POST['userName'] ?></p>
                    <p class="mb-0">Email:  <?= $_POST['email'] ?></p>
                    <p class="mb-0">Phone:  <?= $_POST['phoneNum'] ?></p>
                    <p class="mb-0">Password:  <?= $_POST['password'] ?></p><hr>
                    <p class="mb-0">This Page will disappear in 10 seconds</p>
                </div>
            </div>
        <?php
        } else {
            // there're errors
            file_put_contents('../user/signup-errors.json', json_encode($errors));
            file_put_contents('../user/signup-user-data-tmp.json', json_encode($userData));
            header('location: ../signup.php');
            die;
        ?>
        <!-- <div class="container mt-5">
            <div class="alert alert-danger">
                <ul>
                <?php
                // foreach($errors as $error) {
                //     echo "<li>" . print_r($error) . "</li>";
                // }
                ?>
                </ul>
            </div>
            <a class="btn btn-primary" href="index.php" role="button">Back</a>
        </div> -->
        <?php
        // die;
        }
// ------------------------
    if (!empty('../user/user-data.json')) {
        $oldUsers = json_decode(file_get_contents('../user/user-data.json'), true);
        $oldUsers[] = $userData;
        file_put_contents('../user/user-data.json', json_encode($oldUsers));
    }else {
        file_put_contents('../user/user-data.json', json_encode($userData));
    }
    header('refresh: 10;url = ../index.php');
}