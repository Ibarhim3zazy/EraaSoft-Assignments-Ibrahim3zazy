<?php 
if (!isset($_SESSION)) session_start();
include '../core/functions.php';
include '../core/validations.php';
include_once '../core/connection.php';
if (checkPostRequestInput('productName')) {
    foreach($_POST as $key => $value) $$key = sanitizeInput($value);

    $errors = [];
    if(!requireVal($productName)) $errors['productName'][] = 'required';
    if(!minVal($productName, 3)) $errors['productName'][] = 'product name length must be between 2 - 30 chars';
    if(!maxVal($productName, 30)) $errors['productName'][] = 'product name length must be between 2 - 30 chars';

    if(!requireVal($productDescription)) $errors['productDescription'][] = 'required';
    if(!minVal($productDescription, 3)) $errors['productDescription'][] = 'product name length must be between 2 - 1000 chars';
    if(!maxVal($productDescription, 1000)) $errors['productDescription'][] = 'product name length must be between 2 - 1000 chars';

    // if(!requireVal($productImage)) $errors['productImage'][] = 'required';
            $fName = $_FILES["productImage"]['name'];
            $fType = $_FILES["productImage"]['type'];
            $fTmpName = $_FILES["productImage"]['tmp_name'];
            $fError = $_FILES["productImage"]['error'];
            $fSize = $_FILES["productImage"]['size'];
        if (!empty($fName)) {
            $ext = pathinfo($fName);
            $originalName = $ext['filename'];
            $originalExt = $ext['extension'];
            $allowed = ["png", "jpg", "jpeg"];
            if ($fError != 0) {
                $errors['productImage'][] = $fError;
            }
            if (in_array($originalExt, $allowed)) {
                if ($fSize < 5000000) {
                    $fNewName = uniqid(rand()) . "." . $originalExt;
                    $destination = "../images/" . "$fNewName";

                    if (!file_exists('images')) {
                        mkdir('images');
                    }
                    move_uploaded_file($fTmpName, $destination);
                }else {
                    $errors['productImage'][] = "your file is too large";
                }
                unlink('../images/'.checkPostRequestInput('productOldImage'));
            }else {
                $errors['productImage'][] = "your file type not allowed";
            }
        }elseif (!checkPostRequestInput('productOldImage')) {
            $errors['productImage'][] = "Please Choose Image";
        }else {
            $fNewName = checkPostRequestInput('productOldImage');
        }

    if (empty($errors)) {
        if (checkPostRequestInput('productId')) {
            $query = "UPDATE `product` SET `product_name` = '$productName', `product_description` = '$productDescription', `product_image_path` = '$fNewName' WHERE `id` = '$productId'";
        }else {
            $query = "INSERT INTO `product` (`id`, `product_name`, `product_description`, `product_image_path`, `product_creation_time`) 
            VALUES (NULL, '$productName', '$productDescription', '$fNewName', NULL)";
        }
        mysqli_query($conn, $query);
        mysqli_close($conn);
        header('location: ../categories.php');
        die;
    } else {
        $_SESSION['errors'] = $errors;
        header('location: ../addNewproduct.php');
        die;
    }
}elseif (checkGetRequestInput('productIdDel')) {
    $productIdDel = $_GET['productIdDel'];
    $query = "DELETE FROM `product` WHERE `id` = '$productIdDel'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    header('location: ../categories.php');
    die;
}else {
    echo 'Not Supported Method Or Wrong product Name';
}