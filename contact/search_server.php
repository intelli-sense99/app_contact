<?php
include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/connection.php');


// echo $_POST['search'];
$url = "http://localhost/workspace/app_contact/contact/list.php";

if (isset($_POST['search']) && !empty($_POST['search'])) {
    $_SESSION["keyword"] = $_POST['search'];
}


header('location:' . $url);
exit;
