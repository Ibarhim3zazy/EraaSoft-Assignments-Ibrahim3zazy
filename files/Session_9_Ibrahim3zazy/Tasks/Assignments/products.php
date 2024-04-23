<?php require_once('inc/header.php') ?>
<?php require_once('inc/nav.php') ?>
<?php require_once('./core/connection.php') ?>

<?php 
    $query = "SELECT * FROM `category`";
    $result = mysqli_query($conn, $query);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $query = "SELECT * FROM `products`";
    $result = mysqli_query($conn, $query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(mysqli_num_rows($result) == 0) {
        echo '<h2 class="text-center mt-5">Nothing To Show</h2>';
        die;
    }

    mysqli_free_result($result);
    mysqli_close($conn);
    
    
?>
<div class="float-left w-25 p-2 accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Categories
        </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <ul class="list-group">
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox" value="" id="allCategories">
                    <label class="form-check-label" for="allCategories">all Categories</label>
                </li>
            <?php $i = 1; foreach ($categories as $category) : ?>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox" value="" id="<?= $category['category_name'] ?>">
                    <label class="form-check-label" for="<?= $category['category_name'] ?>"><?= $category['category_name'] ?></label>
                </li>
            <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
<div class="container mt-5">

    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col" class="col-sm-2">Image</th>
        <th scope="col" class="col-sm-2">Modify</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($products as $product) : ?>
            <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $product['category_name'] ?></td>
            <td><?= $product['category_description'] ?></td>
            <td><img src="./images/<?= $products['image'] ?>" class="rounded d-block" style="width: 50%;" alt="<?= $products['name'] ?>"></td>
            <td>
                <a href="./addNewProduct.php?productId=<?= $product['id'] ?>" class="btn btn-warning">Alter</a>
                <a href="./handelers/handelProduct.php?productIdDel=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </table>
</div>
<?php require_once('inc/footer.php') ?>