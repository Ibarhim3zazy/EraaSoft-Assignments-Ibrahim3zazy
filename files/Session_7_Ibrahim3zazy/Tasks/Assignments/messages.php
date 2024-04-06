<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"></head>
<body>
    <?php 
        if(!isset($_SESSION)) session_start();
        require_once('handelers/functions.php');
    ?>
    <!-- Navigation-->
    <?php include('inc/navbar.php'); 
        isSignedIn();
        isUserExist(true);
        getMessages($_SESSION['userData']['id']);
    ?>
    <div class="container">
        <div class="row">
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">message</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- print_r($_SESSION['messagesData']); -->
                    <?php foreach ($_SESSION['messagesData'] as $messagesDataRow) :?>
                        <tr>
                        <th scope="row">1</th>
                        <td><?= $messagesDataRow['name'] ?></td>
                        <td><?= $messagesDataRow['email'] ?></td>
                        <td><?= $messagesDataRow['phone'] ?></td>
                        <td><?= $messagesDataRow['message'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>