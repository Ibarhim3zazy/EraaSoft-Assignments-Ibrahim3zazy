<?php 
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$rootPatha = $protocol . $_SERVER['HTTP_HOST'] . '/EraaSoft/EraaSoft Assignments/files/Session_7_Ibrahim3zazy/Assignments/';
require_once("handelers/functions.php");
if(!isset($_SESSION)) session_start();
if (isset($_GET['userId'])) { isSignedIn(userId: $_GET['userId']); isUserExist(userId: $_GET['userId']); }else { isSignedIn(); isUserExist(true); }
// print_r(isUserExist(userId: $_GET['userId']));
?>

<nav class="container navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:">Hello, <?= $_SESSION['getUserDataBYId']['userName'] ?? $_SESSION['userData']['userName'] ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="<?= filePath('index.php?userId='.($_SESSION['userData']['id'] ?? $_SESSION['getUserDataBYId']['id'])) ?>">Home</a></li>
        <?php if (isset($_SESSION['userData'])) : ?>
        <li class="nav-item"><a class="nav-link" href="<?= filePath('resume.php') ?>">Resume</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= filePath('projects.php') ?>">Projects</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= filePath('messages.php') ?>">messages</a></li>
        <?php elseif (isset($_SESSION['getUserDataBYId'])) : ?>
        <li class="nav-item"><a class="nav-link" href="<?= filePath('contact.php?userId='.$_SESSION['getUserDataBYId']['id']) ?>">Contact</a></li>
        <?php endif; ?>
      </ul>
      <form class="d-flex d-flex col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary me-2" type="submit">Search</button>
      </form>
      <div class="text-end">
        <?php if (isset($_SESSION['userData'])) : ?>
          <form class="d-flex d-flex col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="login.php" method="POST">
            <input type="text" name="logout" hidden>
            <button class="btn btn-danger me-2" type="submit">Logout</button>
          </form>
        <?php else : ?>
          <a href="login.php" class="btn btn-outline-success me-2" tabindex="-1" role="button" aria-disabled="true">Login</a>
          <a href="signup.php" class="btn btn-warning me-2" tabindex="-1" role="button" aria-disabled="true">Sign-up</a>
        <?php endif; ?>
     </div>
    </div>
  </div>
</nav>