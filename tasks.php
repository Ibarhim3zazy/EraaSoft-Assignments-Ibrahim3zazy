<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Album example · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">

    

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
  </head>
  <body>
    
  <?php include_once 'inc/navbar.php'; ?>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Tasks Page</h1>
        <p class="lead text-muted">Here you can view or download all my tasks that i made in EraaSoft course</p>
        <p>
          <!-- <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?php rootPath(); ?>files/images/first_site.png" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="">
            <div class="card-body">
              <p class="card-text">here you can see the result of using bootstrap and how you can call a bootstrap css and js to build your website and create a navbar to your website and building a full page such as a products page or category page</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?php rootPath(); ?>files/Session_3_Ibrahim3zazy/Tasks/Assignments/index.php" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">2 march 2024</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?php rootPath(); ?>files/images/second_site.png" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="">
            <div class="card-body">
              <p class="card-text">here you can see the result of two sheets thay have a problem solving questions</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?php rootPath(); ?>files/Session_4_Ibrahim3zazy/Tasks/Assignments/index.php" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">8 march 2024</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?php rootPath(); ?>files/images/third_site.png" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="">
            <div class="card-body">
              <p class="card-text">here you can see how to post a data to another page and catch errors to decide if user can containue or no</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?php rootPath(); ?>files/Session_5_Ibrahim3zazy/Tasks/Assignments/index.php" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">16 march 2024</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?php rootPath(); ?>files/images/forth_site.png" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="">
            <div class="card-body">
              <p class="card-text">here you can see how to uploade a file to the server and manage it in his size or type and renaming it and show it if you want</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?php rootPath(); ?>files/Session_6_Ibrahim3zazy/Tasks/Assignments/index.php" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">23 march 2024</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?php rootPath(); ?>files/images/fifth_site.png" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="">
            <div class="card-body">
              <p class="card-text">here you can see the result of using CRUD defination with json files</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?php rootPath(); ?>files/Session_7_Ibrahim3zazy/Tasks/Assignments/index.php" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">29 march 2024</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?php rootPath(); ?>files/images/sixth_site.png" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="">
            <div class="card-body">
              <p class="card-text">here you can see the result of using CRUD defination with sql database</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?php rootPath(); ?>files/Session_8_Ibrahim3zazy/Tasks/Assignments/index.php" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">06 april 2024</small>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
