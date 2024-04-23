<?php require_once('inc/header.php') ?>
<?php require_once('inc/nav.php') ?>
<?php require_once('./core/connection.php') ?>

<?php 
    $query = "SELECT * FROM `category`";
    $result = mysqli_query($conn, $query);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(mysqli_num_rows($result) == 0) {
        echo '<h2 class="text-center mt-5">Nothing To Show</h2>';
        die;
    }
    
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
        <th scope="col" class="col-sm-2">Modify</th>
        <th scope="col" class="col-sm-2">Products Link</th>
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
            <td>
            <a class="icon-link icon-link-hover link-primary link-underline-primary link-underline-opacity-25" href="./products.php?categoryId=<?= $category['id'] ?>">
                    Link
                    <?= $searchSubjectLink ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                    </svg>
                </a>
            </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </table>
</div>
<?php require_once('inc/footer.php') ?>