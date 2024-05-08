<?php
include('./connection.php');
$required_login_fields = ['email', 'password'];
$error = [];

$url = 'http://localhost/workspace/app_contact/login.php';

foreach ($required_login_fields as $key => $value) {
    if (!isset($_POST[$value]) || empty($_POST[$value])) {
        $error[] = "<pre>" . $value . " is requird. </pre>";
    }
}

if (count($error) == 0) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $table = "users";
    $query = "SELECT * FROM $table WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);
    $no_of_rows = mysqli_num_rows($result);

    if ($no_of_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
      
        $url = 'http://localhost/workspace/app_contact/home.php';

        
    } else {
        $_SESSION['error'] = "Invalid Credentials .";
    }
} else {
    $_SESSION['error'] = $error;
}
header('location:' . $url);

exit;
