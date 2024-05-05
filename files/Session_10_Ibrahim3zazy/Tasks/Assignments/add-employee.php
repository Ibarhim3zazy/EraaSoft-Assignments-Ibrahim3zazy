<?php require_once('inc/header.php') ?>
<?php require_once('inc/nav.php') ?>
<?php require_once('./core/functions.php') ?>
<?php require_once('./classes/Session.php') ?>
<?php require_once('./classes/DBEmployee.php') ?>
<?php 
    if (checkGetRequestInput('employeeId')) {
        $employees = DBEmployee::viewSpesificEmployee($_GET['employeeId']);
    }
?>
<div class="container mt-5">
    <form class="row g-3 justify-content-center" action="./handelers/handelemployee.php" method="POST" enctype="multipart/form-data">
    <input type="text" class="form-control" name="employeeId" value="<?= checkGetRequestInput('employeeId'); ?>" hidden >
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Name</label>
        <input type="text" class="form-control <?= Session::checkSession('errors') ? (isset($_SESSION['errors']['name']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Name" name="name" value="<?= $employees[0]['name'] ?? '' ?>" required>
        <?php if (isset($_SESSION['errors']['name'])): ?>
            <div class="invalid-feedback">
            <?php
                foreach (Session::getSession('errors')['name'] as $error) echo "$error <br>";
            ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Department</label>
        <input type="text" class="form-control <?= Session::checkSession('errors') ? (isset($_SESSION['errors']['department']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Department" name="department" value="<?= $employees[0]['department'] ?? '' ?>" required>
        <?php if (isset($_SESSION['errors']['department'])): ?>
            <div class="invalid-feedback">
            <?php
                foreach ($_SESSION['errors']['department'] as $error) echo "$error <br>";
            ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Email Address</label>
        <input type="email" class="form-control <?= Session::checkSession('errors') ? (isset($_SESSION['errors']['email']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Email Address" name="email" value="<?= $employees[0]['email'] ?? '' ?>" required>
        <?php if (isset($_SESSION['errors']['email'])): ?>
            <div class="invalid-feedback">
            <?php
                foreach ($_SESSION['errors']['email'] as $error) echo "$error <br>";
            ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Password</label>
        <input type="password" class="form-control <?= Session::checkSession('errors') ? (isset($_SESSION['errors']['password']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Password" name="password" value="<?= $employees[0]['password'] ?? '' ?>" required>
        <?php if (isset($_SESSION['errors']['password'])): ?>
            <div class="invalid-feedback">
            <?php
                foreach ($_SESSION['errors']['password'] as $error) echo "$error <br>";
            ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-7">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
    </form>
</div>
<?php
    Session::unsetSession('errors');
    require_once('inc/footer.php');
