<?php

// define("ROOT_PATH", dirname(__DIR__));

// echo __DIR__ . "<br>";

require_once 'autoload.php';

// new App;

// die;
?>


<?php require_once(VIEWS.'inc/header.php') ?>
<?php require_once(VIEWS.'inc/nav.php') ?>

<div class="container mt-5">
    <table class="table table-hover" style="text-align: center;">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Search Name</th>
        </tr>
    </thead>
    <?php 
        $searchSubjects = ['MVC'];
    ?>
    <tbody>
        <?php $i = 1; foreach ($searchSubjects as $searchSubjectLink): ?>
        <tr>
            <th scope="row"><?= $i++ ?></th>
            <td>
                <a class="icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25" href="../Searches/<?= $searchSubjectLink ?>.pptx">
                    <?= $searchSubjectLink ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                    </svg>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
<?php require_once(VIEWS.'inc/footer.php') ?>
