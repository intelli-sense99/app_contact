<?php 

include($_SERVER['DOCUMENT_ROOT'] . 'workspace/app_contact/connection.php');
session_start();
session_destroy();

header('location:http://localhost/workspace/app_contact/login.php');
exit;



