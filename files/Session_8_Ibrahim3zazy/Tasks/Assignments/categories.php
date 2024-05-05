<?php require_once('inc/header.php') ?>
<?php require_once('inc/nav.php') ?>
<?php require_once('./core/connection.php') ?>

<?php 
    $query = "SELECT * FROM `category`";
    $result = mysqli_query($conn, $query);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
    // header('location: ../categories.php');
?>
<div class="container mt-5">
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col" class="col-sm-2">Image</th>
        <th scope="col" class="col-sm-2"></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($categories as $category) : ?>
            <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $category['category_name'] ?></td>
            <td><?= $category['category_description'] ?></td>
            <td><img src="./images/<?= $category['category_image_path'] ?>" class="rounded d-block" style="width: 50%;" alt="<?= $category['category_name'] ?>"></td>
            <td>
                <a href="./addNewCategory.php?categoryId=<?= $category['id'] ?>" class="btn btn-warning">Alter</a>
                <a href="./handelers/handelCategory.php?categoryIdDel=<?= $category['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </table>
</div>
<?php require_once('inc/footer.php') ?>