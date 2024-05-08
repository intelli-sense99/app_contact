<?php
include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/connection.php');
$success = false;
$error = false;

if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
// //////////////////////////////

$editId = false;
if (isset($_GET['id'])) {
    $editId = $_GET['id'];
    $table = "contact";
    $query_edit = "SELECT * FROM $table WHERE id= $editId ";
    $result_edit = mysqli_query($connection, $query_edit);
    $contact_edit =  mysqli_fetch_assoc($result_edit);
}

$name = $contact_edit['name'];
$phone = $contact_edit['phone'];
$address = $contact_edit['address'];
//  $image = $contact_edit['image'];


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/partials/head.php');

    ?>
</head>

<body>
    <!-- navbar -->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/partials/header.php');
    ?>
    <!-- success -->
    <?php if ($success) { ?>
        <div class="alert alert-success d-flex justify-content-center">

            <?php
            echo $success;
            ?>
        </div>
    <?php } ?>

    <!-- error -->
    <?php if ($error) { ?>
        <?php if (is_array($error)) { ?>
            <div class="alert alert-danger d-flex justify-content-center">
                <?php foreach ($error as $key => $value) { ?>
                    <?php echo $value;  ?>
                <?php } ?>

            </div>
        <?php } else { ?>
            <div class="alert alert-danger d-flex justify-content-center">
                <?php echo $error_req;  ?>
            </div>
        <?php } ?>
    <?php } ?>


    <div class="container" style=" min-height: 100vh;">
        <!-- form div -->
        <div class=" my-5 col-md-6" width="100px">

            <h1 class="text-center ">Edit</h1>
            <form action="./edit_server.php" method="POST">
                <div class="row">
                    <!-- hidden input field contain id -->
                    <input type="hidden" class="form-control" placeholder="enter name" name="id" value="<?php echo $editId ?>">
                    <!------------------>
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="enter name" name="name" value="<?php echo $name ?>">
                    </div>
                    <div class="col-md-6">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="enter phone" name="phone" value="<?php echo $phone ?>">
                    </div>
                    <div class="col-md-12 my-3">
                        <label>Addres</label>
                        <input type="text" class="form-control" placeholder="enter address" name="address" value="<?php echo $address ?>">
                    </div>

                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button class="btn btn-outline-info text-black fw-bold font-arial">Submit</button>
                </div>
            </form>

        </div>
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