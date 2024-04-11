<?php 
if (!isset($_SESSION)) session_start();
include '../core/functions.php';
include '../core/validations.php';
include_once '../core/connection.php';
if (checkPostRequestInput('categoryName')) {
    foreach($_POST as $key => $value) $$key = sanitizeInput($value);

    $errors = [];
    if(!requireVal($categoryName)) $errors['categoryName'][] = 'required';
    if(!minVal($categoryName, 3)) $errors['categoryName'][] = 'category name length must be between 2 - 30 chars';
    if(!maxVal($categoryName, 30)) $errors['categoryName'][] = 'category name length must be between 2 - 30 chars';

    if(!requireVal($categoryDescription)) $errors['categoryDescription'][] = 'required';
    if(!minVal($categoryDescription, 3)) $errors['categoryDescription'][] = 'category name length must be between 2 - 1000 chars';
    if(!maxVal($categoryDescription, 1000)) $errors['categoryDescription'][] = 'category name length must be between 2 - 1000 chars';

    // if(!requireVal($categoryImage)) $errors['categoryImage'][] = 'required';
            $fName = $_FILES["categoryImage"]['name'];
            $fType = $_FILES["categoryImage"]['type'];
            $fTmpName = $_FILES["categoryImage"]['tmp_name'];
            $fError = $_FILES["categoryImage"]['error'];
            $fSize = $_FILES["categoryImage"]['size'];
        if (!empty($fName)) {
            $ext = pathinfo($fName);
            $originalName = $ext['filename'];
            $originalExt = $ext['extension'];
            $allowed = ["png", "jpg", "jpeg"];
            if ($fError != 0) {
                $errors['categoryImage'][] = $fError;
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
                    $errors['categoryImage'][] = "your file is too large";
                }
                unlink('../images/'.checkPostRequestInput('categoryOldImage'));
            }else {
                $errors['categoryImage'][] = "your file type not allowed";
            }
        }elseif (!checkPostRequestInput('categoryOldImage')) {
            $errors['categoryImage'][] = "Please Choose Image";
        }else {
            $fNewName = checkPostRequestInput('categoryOldImage');
        }

    if (empty($errors)) {
        if (checkPostRequestInput('categoryId')) {
            $query = "UPDATE `new_category` SET `category_name` = '$categoryName', `category_description` = '$categoryDescription', `category_image_path` = '$fNewName' WHERE `id` = '$categoryId'";
        }else {
            $query = "INSERT INTO `new_category` (`id`, `category_name`, `category_description`, `category_image_path`, `category_creation_time`) 
            VALUES (NULL, '$categoryName', '$categoryDescription', '$fNewName', NULL)";
        }
        mysqli_query($conn, $query);
        mysqli_close($conn);
        header('location: ../categories.php');
        die;
    } else {
        $_SESSION['errors'] = $errors;
        header('location: ../addNewCategory.php');
        die;
    }
}elseif (checkGetRequestInput('categoryIdDel')) {
    $categoryIdDel = $_GET['categoryIdDel'];
    $query = "DELETE FROM `new_category` WHERE `id` = '$categoryIdDel'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    header('location: ../categories.php');
    die;
}else {
    echo 'Not Supported Method Or Wrong Category Name';
}