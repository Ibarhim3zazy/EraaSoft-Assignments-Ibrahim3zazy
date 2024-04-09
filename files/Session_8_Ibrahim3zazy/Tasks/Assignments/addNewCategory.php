<?php require_once('inc/header.php') ?>
<?php require_once('inc/nav.php') ?>
<div class="container mt-5">
    <form class="row g-3 justify-content-center" action="./handelers/handelCategory.php" method="POST" enctype="multipart/form-data">
    <input type="text" class="form-control" name="categoryId" hidden >
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Name</label>
        <input type="text" class="form-control <?= isset($_SESSION['errors']) ? (isset($_SESSION['errors']['categoryName']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Add Category Name" name="categoryName" required>
        <?php if (isset($_SESSION['errors']['categoryName'])): ?>
            <div class="invalid-feedback">
            <?php
                foreach ($_SESSION['errors']['categoryName'] as $error) echo "$error <br>";
            ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-7">
        <label for="validationTextarea" class="form-label">Description</label>
        <textarea class="form-control <?= isset($_SESSION['errors']) ? (isset($_SESSION['errors']['categoryDescription']) ? 'is-invalid' : 'is-valid') : '' ?>" id="validationTextarea" placeholder="Add Category Description" name="categoryDescription" required></textarea>
        <?php if (isset($_SESSION['errors']['categoryDescription'])): ?>
            <div class="invalid-feedback">
            <?php
                foreach ($_SESSION['errors']['categoryDescription'] as $error) echo "$error <br>";
            ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-7">
        <label for="validationCustomUsername" class="form-label">Image</label>
        <div class="mb-3">
            <input type="file" class="form-control <?= isset($_SESSION['errors']) ? (isset($_SESSION['errors']['categoryImage']) ? 'is-invalid' : 'is-valid') : '' ?>" aria-label="file example" name="categoryImage" required>
            <?php if (isset($_SESSION['errors']['categoryName'])): ?>
            <div class="invalid-feedback">
            <?php
                foreach ($_SESSION['errors']['categoryImage'] as $error) echo "$error <br>";
            ?>
            </div>
        <?php 
            endif;
            unset($_SESSION['errors']);
        ?>
        </div>
    </div>
    <div class="col-7">
        <button class="btn btn-primary" type="submit">Add Now</button>
    </div>
    </form>
</div>
<?php require_once('inc/footer.php') ?>