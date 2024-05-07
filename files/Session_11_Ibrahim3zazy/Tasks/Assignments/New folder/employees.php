<?php require_once('inc/header.php') ?>
<?php require_once('inc/nav.php') ?>
<?php require_once('./classes/DBEmployee.php') ?>

<?php 
    // $query = "SELECT * FROM `new_category`";
    // $result = mysqli_query($conn, $query);
    // $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // mysqli_free_result($result);
    // mysqli_close($conn);
    
    $employees = DBEmployee::viewSpesificEmployee('%');
    // header('location: ../categories.php');
?>
<div class="container mt-5">
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">email</th>
        <th scope="col">department</th>
        <th scope="col" class="col-sm-2"></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($employees as $employee) : ?>
            <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $employee['name'] ?></td>
            <td><?= $employee['email'] ?></td>
            <td><?= $employee['department'] ?></td>
            <td>
                <a href="./add-employee.php?employeeId=<?= $employee['id'] ?>" class="btn btn-warning">Alter</a>
                <a href="./handelers/handelemployees.php?employeeIdDel=<?= $employee['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </table>
</div>
<?php require_once('inc/footer.php') ?>