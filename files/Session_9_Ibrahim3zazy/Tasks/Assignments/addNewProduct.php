<?php require_once('inc/header.php') ?>
<?php require_once('inc/nav.php') ?>
<?php require_once('./core/functions.php') ?>
<?php 
    if (checkGetRequestInput('productId')) {
        $query = "SELECT * FROM `product` WHERE `id` = '$_GET[productId]'";
        $result = mysqli_query($conn, $query);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $query = "SELECT * FROM `category`";
        $result = mysqli_query($conn, $query);
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);
        mysqli_close($conn);
    }
    
?>
<div class="container mt-5">
    <form class="row g-3 justify-content-center" action="./handelers/handelproduct.php" method="POST" enctype="multipart/form-data">
    <input type="text" class="form-control" name="productId" value="<?= checkGetRequestInput('productId'); ?>" hidden >
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Category</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Open this select</option>
            <option value="1">One</option>
        </select>
    </div>
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Name</label>
        <input type="text" class="form-control <?= isset($_SESSION['errors']) ? (isset($_SESSION['errors']['productName']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Add product Name" name="productName" value="<?= $products[0]['product_name'] ?? '' ?>" required>
        <?php if (isset($_SESSION['errors']['productName'])): ?>
            <div class="invalid-feedback">
            <?php
                foreach ($_SESSION['errors']['productName'] as $error) echo "$error <br>";
            ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-7">
        <label for="validationTextarea" class="form-label">Description</label>
        <textarea class="form-control <?= isset($_SESSION['errors']) ? (isset($_SESSION['errors']['productDescription']) ? 'is-invalid' : 'is-valid') : '' ?>" id="validationTextarea" placeholder="Add product Description" name="productDescription" required><?= $products[0]['product_description'] ?? '' ?></textarea>
        <?php if (isset($_SESSION['errors']['productDescription'])): ?>
            <div class="invalid-feedback">
            <?php
                foreach ($_SESSION['errors']['productDescription'] as $error) echo "$error <br>";
            ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-7">
        <label for="validationCustomUsername" class="form-label">Image</label>
        <div class="mb-3">
            <input type="file" class="form-control <?= isset($_SESSION['errors']) ? (isset($_SESSION['errors']['productImage']) ? 'is-invalid' : 'is-valid') : '' ?>" aria-label="file example" name="productImage" <?= checkGetRequestInput('productId') ?: 'required'?> >
            <input type="text" value="<?= $products[0]['product_image_path'] ?? '' ?>" name="productOldImage" hidden>
            <?php if (isset($products[0]['product_image_path'])): ?>
            <img src="./images/<?= $products[0]['product_image_path'] ?>" class="rounded d-block mt-3" style="width: 25%;" >
            <?php endif; ?>
            <?php if (isset($_SESSION['errors']['productImage'])): ?>
            <div class="invalid-feedback">
            <?php
                foreach ($_SESSION['errors']['productImage'] as $error) echo "$error <br>";
            ?>
            </div>
        <?php 
            endif;
            unset($_SESSION['errors']);
        ?>
        </div>
    </div>
    <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Price</label>
        <input type="text" class="form-control <?= isset($_SESSION['errors']) ? (isset($_SESSION['errors']['categoryPrice']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Add Category Price" name="categoryPrice" value="<?= $categories[0]['category_price'] ?? '' ?>" required>
        <?php if (isset($_SESSION['errors']['categoryPrice'])): ?>
            <div class="invalid-feedback">
            <?php
                foreach ($_SESSION['errors']['categoryPrice'] as $error) echo "$error <br>";
            ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-7">
        <button class="btn btn-primary" type="submit">Add Now</button>
    </div>
    </form>
</div>
<?php require_once('inc/footer.php') ?>