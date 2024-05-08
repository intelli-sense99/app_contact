<?php
// echo "<pre>";
// print_r($_POST) . "<br>"; 
// print_r($_FILES['file']);
// echo "</pre>"; die;








include('./connection.php');
$url = 'http://localhost/workspace/app_contact/register.php';
$required_fields = ['name', 'email', 'phone', 'password', 'address'];
$error = [];
$_SESSION['old_data'] = $_POST;

// // 1st layer
foreach ($required_fields as $key => $value) {

    if (!isset($_POST[$value]) || empty($_POST[$value])) {
        $error[] = "<p>" . $value . " is required. </p>";
    }
}

// 2nd  layer


if (count($error) == 0) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $table_name = 'users';

    // email validation
    $query = "SELECT * FROM $table_name WHERE email='$email' ";
    $result = mysqli_query($connection, $query);
    $exist_email_rows = mysqli_num_rows($result);

    if ($exist_email_rows > 0) {
        $error[] = 'Entred email is already exists!';
    }
}

// 3rd layer
if (count($error) == 0) {
    // contact validation
    if (!is_numeric($phone)) {
        $error[] = 'entred number must be numeric';
    } else if (strlen($phone) != 10) {
        $error[] = 'Entred number contain 10 digits';
    }
}
// 4th layer
if (count($error) == 0) {
    // image field validation
    if (!isset($_FILES['file']['name']) || empty($_FILES['file']['name'])) {
        $error[] = 'image is requried!';
    }
}
// 5th layer
if (count($error) == 0) {
    // image file validation
    $unique_name = '';

    if (isset($_FILES['file']['name']) || empty($_FILES['file']['name'])) {
        $name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $path_info = pathinfo($name);
        // print_r($path_info);

        // we want filename and its extension
        $fileName = $path_info['filename'];
        $extension = strtolower($path_info['extension']);
        // array of allowed extensions
        $allowed_extension = ['jpeg', 'jpg', 'png', 'gif'];

        if (in_array($extension, $allowed_extension)) {

            //create a unique using time() function and file extension
            $unique_name = time() . "." . $extension;
            // destination of users image
            $destination = './uploads/' . $unique_name;
            // move_uplodes_files() used to move files
            $is_uploaded = move_uploaded_file($tmp_name, $destination);
            if (!$is_uploaded) {
                $error[] = 'image dose not moved!';
            }
        } else {
            $error[] = 'Image type is not accepted';
        }
    }
}

// 6th layer

if (count($error) == 0) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $table_name = 'users';
    $image = $unique_name;

    $query = "INSERT INTO $table_name (`name`,`phone`,`email`,`password`,`image`,`address`) VALUES ('$name','$phone','$email','$password','$image','$address')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $_SESSION['success'] = 'Registered successfully.';
    } else {
        $errors[] = 'Invalid Credentials!';
    }
} else {
    $_SESSION['error'] = $error;
}

header('location:' . $url);
exit;
