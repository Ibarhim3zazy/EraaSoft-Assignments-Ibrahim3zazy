<?php require_once(VIEWS.'inc/header.php') ?>
<?php require_once(VIEWS.'inc/nav.php') ?>

 


<div class="container mt-5">
    
    <?php if (isset($success)) : ?>
        <h2 class="alert alert-success text-center"><?= $success ?></h2>
    <?php endif ?>

    <form class="row g-3 justify-content-center" action="<?php url("product/update/".$row['id']."") ?>" method="POST" enctype="multipart/form-data">
    <input type="text" class="form-control" name="employeeId" value="<?php //checkGetRequestInput('employeeId') ?>" hidden >
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Name" value="<?= $row['name'] ?>" name="name" required>
    </div>
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Price</label>
        <input type="price" class="form-control" placeholder="Price" value="<?= $row['price'] ?>" name="price" required>
    </div>
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Description</label>
        <input type="text" class="form-control" placeholder="Description" value="<?= $row['description'] ?>" name="description" required>
    </div>

    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Quantity</label>
        <input type="number" class="form-control" placeholder="qty" value="<?= $row['qty'] ?>" name="qty" required>
    </div>
    <div class="col-7">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
    </form>
</div>
<?php
    require_once('inc/footer.php');
