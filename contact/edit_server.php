<?php

include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/connection.php');

$required_fields = ['name', 'phone', 'address', 'id'];
// $url = 'http://localhost/workspace/app_contact/contact/edit.php';
$errors = [];


// field validation empty or not  for each field.
foreach ($required_fields as $key => $value) {

    if (!isset($_POST[$value]) || empty($_POST[$value])) {

        $errors[] = "<p>" . $value . " is required. </p> ";
    }
}
$id = $_POST['id'];
$url = 'http://localhost/workspace/app_contact/contact/edit.php?id='. $id;


if (count($errors) == 0) {


    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // phone number validation----------------------------------

    if (count($errors) == 0) {

        if (!is_numeric($phone)) {
            $errors[] = 'Phone number should be numeric only';
            header("Location:" . $url);
        } else if (strlen($phone) != 10) {

            $errors[] = 'Phone number should be only 10 digits';
        }
    }
    // password and confirm password validation
    if (count($errors) == 0) {

        $table = 'contact';
        $query = "UPDATE $table SET `name` = '$name',`phone` = '$phone' ,`address` = '$address' WHERE `id` = $id";
        // echo $query;
        // die;
        $result = mysqli_query($connection, $query);

        if ($result) {

            $_SESSION['success'] = 'Updated Successfully!';
        } else {

            $errors[] = 'Something went wrong!';
        }
    }
} else {

    $_SESSION['error'] = $errors;
}


header('location:' . $url);
exit;
