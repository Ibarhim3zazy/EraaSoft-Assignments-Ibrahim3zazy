<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <h1>sign Up</h1>
            <form class="row g-3" action="welcome.php" method="POST">
                <div class="col-6">
                    <label for="inputAddress" class="form-label">Name</label>
                    <input type="text" required class="form-control" name="name" id="inputAddress" placeholder="Ibrahim Elsayed Azazy">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" required class="form-control" name="email" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" required class="form-control" name="password" id="inputPassword4">
                </div>
                <div class="col-6">
                    <label for="inputAddress2" class="form-label">Phone</label>
                    <input type="text" required class="form-control" name="phone" id="inputAddress2" placeholder="011*******0">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>