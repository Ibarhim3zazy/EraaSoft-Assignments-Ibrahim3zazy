<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<?php

// require_once('../handelers/functions.php');
require_once('../errorHandeling/validationInput.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $messageContent = [
         "userId" => $_POST['userId'],
         "name" => $_POST['name'],
         "email" => $_POST['email'],
         "phone" => $_POST['phone'],
         "message" => $_POST['message'],
        ];

    $errors = [];

        foreach($_POST as $key => $value) $$key = sanitizeInput($value);

        if(empty($name)) $errors["nameErrors"][] = 'Name field is required';
        if(strlen($name) < 3 || strlen($name) > 30) $errors["nameErrors"][] = 'Name value must be among 3 and 30 characters';
        
        if(empty($email)) $errors["emailErrors"][] = 'Email field is required';

        if(empty($phone)) $errors["phoneErrors"][] = 'phone field is required';
        if(is_int($phone)) $errors["phoneErrors"][] = 'Phone number value must be numbers (integer)';
        if(strlen($phone) !== 11) $errors["phoneErrors"][] = 'Phone number value must be 11 numbers';


        if(empty($message)) $errors["messagesErrors"][] = 'message field is required';
        if(strlen($message) < 6) $errors["messagesErrors"][] = 'Message value must be bigger than 5 chars at least';

        if(empty($errors)) {
            // there're no errors
            if (file_exists('../user/contact-data.json') && !empty('../user/contact-data.json')) {
                $oldmessages = json_decode(file_get_contents('../user/contact-data.json'), true);
                $oldmessages[] = $messageContent;
                file_put_contents('../user/contact-data.json', json_encode($oldmessages));
            }else {
                file_put_contents('../user/contact-data.json', json_encode($messageContent));
            }        
        ?>
        
            <div class="container mt-5">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Aww yeah, your message sented successfuly.</p><hr>
                    <p class="mb-0">Name: <?= $_POST['name'] ?></p>
                    <p class="mb-0">Email:  <?= $_POST['email'] ?></p>
                    <p class="mb-0">Phone:  <?= $_POST['phone'] ?></p>
                    <p class="mb-0">message:  <?= $_POST['message'] ?></p><hr>
                    <p class="mb-0">This Page will disappear in 60 seconds</p>
                    <a href="../index.php?userId=<?= $_POST['userId']; ?>" class="d-grid mt-4 btn btn-success">Continue</a>
                </div>
            </div>
        <?php
        } else {
            // there're errors
            file_put_contents('../user/contact-errors.json', json_encode($errors));
            file_put_contents('../user/contact-data-tmp.json', json_encode($messageContent));
            header('location: ../contact.php?userId=' . $_POST['userId']);
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
    header('refresh: 60;url = ../index.php?userId=' . $_POST['userId']);
}