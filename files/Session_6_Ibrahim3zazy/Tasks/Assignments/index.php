<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <H1>Hello, My Bro you can uploading any file from here</H1>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="file" class="form-control" name='image' id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Upload</button>
                </div>
            </form>
        </div>
    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
            $fName = $_FILES["image"]['name'];
            $fType = $_FILES["image"]['type'];
            $fTmpName = $_FILES["image"]['tmp_name'];
            $fError = $_FILES["image"]['error'];
            $fSize = $_FILES["image"]['size'];
        if ($fName != "") {
            $ext = pathinfo($fName);
            $originalName = $ext['filename'];
            $originalExt = $ext['extension'];

            $allowed = ["png", "jpg", "jpeg", "gif", "pdf"];
            if ($fError != 0) {
                $error['errors'] = $fError;
            }
            if (in_array($originalExt, $allowed)) {
                if ($fSize < 500000) {
                    $fNewName = uniqid('', true) . "." . $originalExt;
                    $destination = "uploads/" . "$fNewName";

                    if (!file_exists('uploads')) {
                        mkdir('uploads');
                    }
                    move_uploaded_file($fTmpName, $destination);
                    echo <<<Success
                    <div class="alert alert-success" role="alert">
                    You file is uploaded Successfuly click <a href="$destination" target="_blank">Here</a> to view
                    </div>
                    Success;
                }else {
                    $error['size'] = "your file is too large";
                }
            }else {
                $error['ext'] = "your file not allowed";
            }
        }else {
            $error['name'] = "Please Choose Image";
        }
    }
    ?>
    <div class="row">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($error as $errorName => $errorMassege) {
                        echo $errorMassege . "<br>";
                    } 
                    ?>
            </div> 
        <?php endif; ?>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>