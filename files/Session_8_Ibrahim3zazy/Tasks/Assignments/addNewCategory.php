<?php require_once('inc/header.php') ?>
<?php require_once('inc/nav.php') ?>
<?php require_once('./core/functions.php') ?>
<?php 
    if (checkGetRequestInput('categoryId')) {
        $query = "SELECT * FROM `new_category` WHERE `id` = '$_GET[categoryId]'";
        $result = mysqli_query($conn, $query);
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }
    
?>
<div class="container mt-5">
    <form class="row g-3 justify-content-center" action="./handelers/handelCategory.php" method="POST" enctype="multipart/form-data">
    <input type="text" class="form-control" name="categoryId" value="<?= checkGetRequestInput('categoryId'); ?>" hidden >
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Name</label>
        <input type="text" class="form-control <?= isset($_SESSION['errors']) ? (isset($_SESSION['errors']['categoryName']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Add Category Name" name="categoryName" value="<?= $categories[0]['category_name'] ?? '' ?>" required>
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
        <textarea class="form-control <?= isset($_SESSION['errors']) ? (isset($_SESSION['errors']['categoryDescription']) ? 'is-invalid' : 'is-valid') : '' ?>" id="validationTextarea" placeholder="Add Category Description" name="categoryDescription" required><?= $categories[0]['category_description'] ?? '' ?></textarea>
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
            <input type="file" class="form-control <?= isset($_SESSION['errors']) ? (isset($_SESSION['errors']['categoryImage']) ? 'is-invalid' : 'is-valid') : '' ?>" aria-label="file example" name="categoryImage" <?= checkGetRequestInput('categoryId') ?: 'required'?> >
            <input type="text" value="<?= $categories[0]['category_image_path'] ?? '' ?>" name="categoryOldImage" hidden>
            <?php if (isset($categories[0]['category_image_path'])): ?>
            <img src="./images/<?= $categories[0]['category_image_path'] ?>" class="rounded d-block mt-3" style="width: 25%;" >
            <?php endif; ?>
            <?php if (isset($_SESSION['errors']['categoryImage'])): ?>
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