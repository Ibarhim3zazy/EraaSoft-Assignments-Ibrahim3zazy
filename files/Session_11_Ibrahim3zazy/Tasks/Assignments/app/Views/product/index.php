<?php require_once(VIEWS.'inc/header.php') ?>
<?php require_once(VIEWS.'inc/nav.php') ?>

<h1 class="text-center my-5 py-3">View All Products</h1>
<div class="container mt-5">
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">QTY</th>
        <th scope="col" class="col-sm-2"></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($products as $prod) : ?>
            <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $prod['name'] ?></td>
            <td><?= $prod['price'] ?></td>
            <td><?= $prod['description'] ?></td>
            <td><?= $prod['qty'] ?></td>
            <td>
                <a href="<?php url('product/edit/'.$prod['id'].'') ?>" class="btn btn-warning">Edit</a>
                <a href="<?php url('product/delete/'.$prod['id'].'') ?>" class="btn btn-danger">Delete</a>
            </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </table>
</div>
<?php require_once(VIEWS.'inc/footer.php') ?>