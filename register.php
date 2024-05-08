<?php

// include('./connection.php');
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Sign up</title>
</head>

<body class="bg-dark">
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
    <div class="container d-flex justify-content-center align-items-center ">

        <div class=" h-auto shadow-lg p-5  text-white " style=" border: 2px solid aqua; border-radius:10px ; ">
            <h1 class="text-center">Sign up</h1>

            <form action="./register_server.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo (isset($old_data) && isset($old_data['name'])) ? $old_data['name'] : '' ?>">
                    </div>
                    <div class=" mb-3 col-md-6">
                        <label for="contect" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter contact number" value="<?php echo (isset($old_data) && isset($old_data['phone'])) ? $old_data['phone'] : '' ?>">
                    </div>

                </div>

                <div class="mb-3 ">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo (isset($old_data) && isset($old_data['email'])) ? $old_data['email'] : '' ?>">
                </div>
                <div class="row">

                    <div class=" mb-3 col-md-6 ">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?php echo (isset($old_data) && isset($old_data['address'])) ? $old_data['address'] : '' ?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo (isset($old_data) && isset($old_data['password'])) ? $old_data['password'] : '' ?>">
                    </div>

                </div>
                <div class=" mb-3 ">
                    <label for="file" class="form-label">Image</label>
                    <input type="file" class="form-control" name="file">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-info w-25 ">Submit</button>
                </div>
                <p class="text-center my-2 ">OR</p>

                <div>
                    <p class=" text-center ">Have an account? <a href="http://localhost/workspace/app_contact/login.php">Login here</a></p>

                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>