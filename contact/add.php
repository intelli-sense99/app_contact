<?php

include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/connection.php');


$success_req = false;
$error_req = false;
$old_data = false;

if (isset($_SESSION['success'])) {
    $success_req = $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    $error_req = $_SESSION['error'];
    unset($_SESSION['error']);
}
if (isset($_SESSION['old_data'])) {
    $old_data = $_SESSION['old_data'];
    unset($_SESSION['old_data']);
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/partials/head.php');
    ?>
</head>

<body style="background-image: linear-gradient(to right, #ff512f, #f09819);">
    <!-- navbar -->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/partials/header.php');
    ?>

    <!-- success -->
    <?php if ($success_req) { ?>
        <div class="alert alert-success text-center ">
            <p><?php echo $success_req; ?></p>
        </div>
    <?php } ?>
    <!-- error -->
    <?php if ($error_req) { ?>
        <?php if (is_array($error_req)) { ?>
            <div class="alert alert-danger text-center">
                <?php foreach ($error_req as $key => $value) { ?>
                    <p><?php echo $value;  ?></p>
                <?php } ?>

            </div>
        <?php } else { ?>
            <div class="alert alert-danger">
                <p><?php echo $error_req;  ?></p>
            </div>
        <?php } ?>
    <?php } ?>

    <!-- main container -->
    <div class="container d-flex justify-content-center" style="min-height: 100vh; ">

        <div class="col-md-5 mt-3 " style=" box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset; background: rgba(208, 79, 51, 0.29);
            border-radius: 16px;
            backdrop-filter: blur(3.4px);
            -webkit-backdrop-filter: blur(3.4px);">
            <h1 class="text-center my-3">Add Form</h1>
            <hr>
            <form class="p-3 form-control-lg" action="./add_server.php" method="POST" enctype="multipart/form-data">
                <!-- auther id -->
                <input type="hidden" class="form-control" name="autherId">

                <div class="form-group">
                    <label for="">Name </label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo (isset($old_data) && isset($old_data['name'])) ? $old_data['name'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="">Email </label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo (isset($old_data) && isset($old_data['email'])) ? $old_data['email'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="">phone </label>
                    <input type="text" class="form-control" name="phone" placeholder=" Enter phone" value="<?php echo (isset($old_data) && isset($old_data['phone'])) ? $old_data['phone'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="">Address </label>
                    <input type="text" class="form-control" name="address" placeholder="Enter address" value="<?php echo (isset($old_data) && isset($old_data['address'])) ? $old_data['address'] : '' ?>">
                </div>
                
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="file" ">
                </div>
                <br>

                <div class=" d-flex justify-content-center ">
                    <button type=" submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>


    </div>
    <div class="container">
        <h1></h1>
    </div>




    <!-- footer -->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/partials/footer.php');
    ?>
    <!-- footer script -->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/partials/footer-script.php');
    ?>
</body>

</html>