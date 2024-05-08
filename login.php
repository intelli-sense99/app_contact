<?php
// include('./connection.php');
include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/connection.php');


// $success_req = false;
$error_req = false;

// if (isset($_SESSION['success'])) {
//     $success_req = $_SESSION['success'];
//     unset($_SESSION['success']);
// }
if (isset($_SESSION['error'])) {
    $error_req = $_SESSION['error'];
    unset($_SESSION['error']);
}

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>User Login</title>
</head>

<body class="bg-dark"">
<!-- login success -->

<!-- login error -->
<?php if ($error_req) { ?>

<?php if (is_array($error_req)) {  ?>

    <div class=" container alert alert-danger d-flex justify-content-center">
    <?php foreach ($error_req as $key => $value) { ?>
        <?php echo $value;  ?>
    <?php } ?>
    </div>

<?php } else { ?>
    <div class="container alert alert-danger d-flex justify-content-center">
        <?php echo $error_req;  ?>
    </div>

<?php } ?>
<?php } ?>
<div class="container d-flex justify-content-center align-items-center vh-100  ">
    <div class=" p-4 text-monospace " style="width: 450px; border-radius: 16px; border: 2px solid aqua;">
        <!-- Login form -->
        <div class="  text-center font-italic ">
            <h3 class="text-white">Login Here!</h3>

        </div>
        <form action="./login_server.php" method="POST">
            <div class="form-group input-group-md my-2  ">
                <label class="text-white my-2 fs-5 " for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email">
            </div>

            <div class="form-group input-group-md my-2">
                <label class="fs  text-white my-2 fs-5 " for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
            </div>

            <div class=" d-flex justify-content-center align-items-center ">
                <button type="submit" class="btn  btn-outline-info accordion my-2 w-25  ">Login</button>
            </div>

            <!-- -----------or----------- -->

            <div>
                <p class="text-center  text-white ">OR</p>

                <p class=" text-center text-white  ">Don't have an account? <a href="http://localhost/workspace/app_contact/register.php">Register here</a></p>

            </div>
        </form>


    </div>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>