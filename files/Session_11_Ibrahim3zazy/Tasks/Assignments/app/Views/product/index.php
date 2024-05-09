<?php require_once(VIEWS.'inc/header.php') ?>
<?php require_once(VIEWS.'inc/nav.php') ?>


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
                <a href="./add-employee.php?employeeId=<?= $prod['id'] ?>" class="btn btn-warning">Alter</a>
                <a href="./handelers/handelemployees.php?employeeIdDel=<?= $prod['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </table>
</div>
<?php require_once(VIEWS.'inc/footer.php') ?>