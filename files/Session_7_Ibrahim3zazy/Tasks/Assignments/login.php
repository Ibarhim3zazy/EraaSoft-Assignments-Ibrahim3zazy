<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Signin Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


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

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <?php 

    // echo password_hash(sha1('admin'), PASSWORD_BCRYPT);

    require_once('handelers/functions.php');
    logOut();
    isSignedIn(false);
    ?>
    
<main class="form-signin w-100 m-auto">
  <form action="index.php" method=POST>
    <img class="mb-4" src="files/images/login.png" alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal">sign in</h1>

    <div class="form-floating">
      <label for="floatingInput">User name</label>
      <input type="text" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
    </div>
    <div class="form-floating">
      <label for="floatingPassword">Password</label>
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
    </div>

    <?php if (isset($_GET['userData']) && $_GET['userData'] == 'invalid'): ?>
      <div class="alert alert-danger" role="alert">
        Your email or password is incorrect
      </div>
    <?php endif; ?>
    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p><a class="link-opacity-100" href="signup.php">signup now</a></p>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2024</p>
  </form>
</main>


    
  </body>
</html>
