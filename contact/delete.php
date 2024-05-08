<?php
// echo $_GET['id'];
include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/connection.php');

$contactId = false;
if (isset($_GET['id'])) {
    $contactId = $_GET['id'];
    $table = "contact";
    $query_del = "DELETE FROM $table WHERE id = $contactId";
    $result_del =  mysqli_query($connection, $query_del);
    if ($result_del) {
        $_SESSION['success'] = 'Contact data deleted successfully';
    }
}
header('location:http://localhost/workspace/app_contact/contact/list.php');
exit;
