<?php require_once(VIEWS.'inc/header.php') ?>
<?php require_once(VIEWS.'inc/nav.php') ?>

<div class="container mt-5">
    
    <?php if (isset($success)) : ?>
        <h2 class="alert alert-danger text-center"><?= $success ?></h2>
    <?php endif ?>

</div>

<?php
    require_once('inc/footer.php');
