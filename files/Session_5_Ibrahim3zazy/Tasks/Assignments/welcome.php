<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <?php

        function sanitizeInput($input)
        {
            return htmlspecialchars(htmlentities(stripslashes(trim($input))));
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = [];

            foreach($_POST as $key => $value) $$key = sanitizeInput($value);

            // $name   = sanitizeInput($_POST['name']);
            // $email  = sanitizeInput($_POST['email']);
            // $age    = sanitizeInput($_POST['age']);

            if(empty($name)) $errors[] = 'Name field is required';
            if(strlen($name) < 3 || strlen($name) > 10) $errors[] = 'Name value must be among 3 and 10 characters';
            
            if(empty($email)) $errors[] = 'Email field is required';

            if(empty($phone)) $errors[] = 'phone field is required';
            if(is_int($phone)) $errors[] = 'Phone number value must be numbers (integer)';
            if(strlen($phone) !== 11) $errors[] = 'Phone number value must be 11 numbers';

            if(empty($password)) $errors[] = 'password field is required';
            if(strlen($password) < 3 || strlen($name) > 20) $errors[] = 'password value must be among 3 and 20 characters';

            // (TASK) validate age is requried and should be numeric


            if(empty($errors)) {
                // there're no errors
            ?>
                <div class="container mt-5">
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Well done!</h4>
                            <p>Aww yeah, you successfully signed up.</p>
                            <hr>
                            <p class="mb-0">Name: <?= $_POST['name'] ?></p>
                            <p class="mb-0">Email:  <?= $_POST['email'] ?></p>
                            <p class="mb-0">Phone:  <?= $_POST['phone'] ?></p>
                            <p class="mb-0">Password:  <?= $_POST['password'] ?></p>
                        </div>
                        <a class="btn btn-success" href="index.php" role="button">Continue</a>
                    </div>
                </div>
            <?php
            } else {
                // there're errors
            ?>
            <div class="container mt-5">
                <div class="alert alert-danger">
                    <ul>
                    <?php
                    foreach($errors as $error) {
                        echo "<li>$error</li>";
                    }
                    ?>
                    </ul>
                </div>
                <a class="btn btn-primary" href="index.php" role="button">Back</a>
            </div>
            <?php
            }
        }
    ?>
    
</body>
</html>