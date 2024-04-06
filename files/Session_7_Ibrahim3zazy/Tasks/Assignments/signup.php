<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php require_once('errorHandeling/signupErrors.php') ?>
    <form class="container mt-5" action="handelers/signup.php" method="POST">
        <h1>Sign up now</h1>
        <div class="form-row mt-5">
            <div class="col-md-4 mb-3">
            <label for="validationServer01">First name</label>
            <input type="text" class="form-control is-<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("FirstNameErrors"))) ? "valid" : "invalid"; ?>" id="validationServer01" name="firstName" value="<?php echo tmpUserData("firstName") ?>" placeholder="First name" required>
            <div class="<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("FirstNameErrors"))) ? "valid" : "invalid"; ?>-feedback">
                <?php if (file_exists('user/signup-errors.json')) echo showErrors("FirstNameErrors") ?? "Looks good!"; ?>
            </div>
            </div>
            <div class="col-md-4 mb-3">
            <label for="validationServer02">Last name</label>
            <input type="text" class="form-control is-<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("LastNameErrors"))) ? "valid" : "invalid"; ?>" id="validationServer02" name="lastName" value="<?php echo tmpUserData("lastName") ?>" placeholder="Last name" required>
            <div class="<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("LastNameErrors"))) ? "valid" : "invalid"; ?>-feedback">
                <?php if (file_exists('user/signup-errors.json')) echo showErrors("LastNameErrors") ?? "Looks good!"; ?>
            </div>
            </div>
            <div class="col-md-4 mb-3">
            <label for="validationServerUsername">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend3">@</span>
                </div>
                <input type="text" class="form-control is-<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("UserNameErrors"))) ? "valid" : "invalid"; ?>" id="validationServerUsername" name="userName" value="<?php echo tmpUserData("userName") ?>" placeholder="Username" aria-describedby="inputGroupPrepend3" required>
                <div class="<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("UserNameErrors"))) ? "valid" : "invalid"; ?>-feedback">
                  <?php if (file_exists('user/signup-errors.json')) echo showErrors("UserNameErrors") ?? "Looks good!"; ?>
                </div>
            </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
            <label for="validationServer01">Email</label>
            <input type="email" class="form-control is-<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("EmailErrors"))) ? "valid" : "invalid"; ?>" id="validationServer01" name="email" value="<?php echo tmpUserData("email") ?>" placeholder="email" required>
            <div class="<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("EmailErrors"))) ? "valid" : "invalid"; ?>-feedback">
               <?php if (file_exists('user/signup-errors.json')) echo showErrors("EmailErrors") ?? "Looks good!"; ?>
            </div>
            </div>
            <div class="col-md-4 mb-3">
            <label for="validationServer02">Phone number</label>
            <input type="number" class="form-control is-<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("PhoneErrors"))) ? "valid" : "invalid"; ?>" id="validationServer02" name="phoneNum" value="<?php echo tmpUserData("phoneNum") ?>" placeholder="Phone number" required>
            <div class="<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("PhoneErrors"))) ? "valid" : "invalid"; ?>-feedback">
              <?php if (file_exists('user/signup-errors.json')) echo showErrors("PhoneErrors") ?? "Looks good!"; ?>
            </div>
            </div>
            <div class="col-md-4 mb-3">
            <label for="validationServer02">Password</label>
            <input type="password" class="form-control is-<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("PasswordErrors"))) ? "valid" : "invalid"; ?>" id="validationServer02" name="password" placeholder="Password" required>
            <div class="<?php if (file_exists('user/signup-errors.json')) echo (is_null(showErrors("PasswordErrors"))) ? "valid" : "invalid"; ?>-feedback">
                <?php if (file_exists('user/signup-errors.json')) echo showErrors("PasswordErrors") ?? "Looks good!"; ?>
            </div>
            </div>
        </div>
        <!-- <div class="form-row">
            <div class="col-md-6 mb-3">
            <label for="validationServer03">City</label>
            <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
            </div>
            <div class="col-md-3 mb-3">
            <label for="validationServer04">State</label>
            <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
            </div>
            <div class="col-md-3 mb-3">
            <label for="validationServer05">Zip</label>
            <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
            </div>
        </div> -->
        <!-- <div class="form-group">
            <div class="form-check">
            <input class="form-check-input is-invalid" type="checkbox" name="terms" value="terms" id="invalidCheck3" required>
            <label class="form-check-label" for="invalidCheck3">
                Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
            </div>
        </div> -->
        <button class="btn btn-primary" type="submit">Sign up</button>
    </form>
    <?php 
        if (file_exists('user/signup-user-data-tmp.json')) unlink('user/signup-user-data-tmp.json');
        if (file_exists('user/signup-errors.json')) unlink('user/signup-errors.json');
    ?>
</body>
</html>