<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Modern Business - EraaSoft Personal Webiste Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include('inc/navbar.php'); ?>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Get in touch</h1>
                            <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->
                                <?php require_once('errorHandeling/contactErrors.php') ?>
                                <form  action="handelers/contact.php" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
                                    <input class="form-control" id="name" name="userId" type="text" value="<?= $_GET['userId'] ?>" hidden />
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." value="<?php echo tmpMessageData("name") ?>" data-sb-validations="required" />
                                        <label for="name">Full name</label>
                                        <div class="d-block <?php if (file_exists('user/contact-errors.json')) echo (is_null(showErrors("nameErrors"))) ? "valid" : "invalid"; ?>-feedback" data-sb-feedback="name:required">
                                        <?php if (file_exists('user/contact-errors.json')) echo showErrors("nameErrors") ?? "Looks good!"; ?>
                                        </div>
                                    </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" value="<?php echo tmpMessageData("email") ?>" data-sb-validations="required,email" />
                                        <label for="email">Email address</label>
                                        <div class="d-block <?php if (file_exists('user/contact-errors.json')) echo (is_null(showErrors("emailErrors"))) ? "valid" : "invalid"; ?>-feedback" data-sb-feedback="email:required">
                                        <?php if (file_exists('user/contact-errors.json')) echo showErrors("emailErrors") ?? "Looks good!"; ?>
                                        </div>
                                    </div>
                                    <!-- Phone number input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="phone" name="phone" type="tel" placeholder="01234567890" value="<?php echo tmpMessageData("phone") ?>" data-sb-validations="required" />
                                        <label for="phone">Phone number</label>
                                        <div class="d-block <?php if (file_exists('user/contact-errors.json')) echo (is_null(showErrors("phoneErrors"))) ? "valid" : "invalid"; ?>-feedback" data-sb-feedback="phone:required">
                                        <?php if (file_exists('user/contact-errors.json')) echo showErrors("phoneErrors") ?? "Looks good!"; ?>
                                        </div>
                                    </div>
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"><?php echo tmpMessageData("message") ?></textarea>
                                        <label for="message">Message</label>
                                        <div class="d-block <?php if (file_exists('user/contact-errors.json')) echo (is_null(showErrors("messagesErrors"))) ? "valid" : "invalid"; ?>-feedback" data-sb-feedback="message:required">
                                        <?php if (file_exists('user/contact-errors.json')) echo showErrors("messagesErrors") ?? "Looks good!"; ?>
                                        </div>
                                    </div>
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->
                                    <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder">Form submission successful!</div>
                                            To activate this form, sign up at
                                            <br />
                                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                        </div>
                                    </div>
                                    <!-- Submit error message-->
                                    <!---->
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0">Copyright &copy; Your Website 2023</div></div>
                    <div class="col-auto">
                        <a class="small" href="#!">Privacy</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" href="#!">Terms</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>

        <?php 
        if (file_exists('user/contact-data-tmp.json')) unlink('user/contact-data-tmp.json');
        if (file_exists('user/contact-errors.json')) unlink('user/contact-errors.json');
        ?>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
