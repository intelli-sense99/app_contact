<?php

// echo $_GET['id'];
include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/connection.php');

// echo $_SESSION['id']; 
$base_url = 'http://localhost/workspace/app_contact';

if (isset($_GET['id'])) {
    $login_user_id = $_SESSION['id'];
    $contact_card_id = $_GET['id'];

    $query_profile = "SELECT * FROM contact WHERE id = $contact_card_id ";
    $result_profile = mysqli_query($connection, $query_profile);
    $row_profile = mysqli_fetch_assoc($result_profile);
}
// print_r($row_profile);
$profile_name = $row_profile['name'];
$profile_email = $row_profile['email'];
$profile_address = $row_profile['address'];
$profile_phone = $row_profile['phone'];
// $profile_image = $row_profile['image'];





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/partials/head.php');
    ?>



</head>

<body>
    <!-- navbar -->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/partials/header.php');
    ?>
    <div class="container" style="min-height:90vh;">
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">

                    <div class="col-xl-12 col-md-12 " ">
                        <div class=" card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25 img-profile ">
                                        <img src="<?php echo $base_url . "/uploads/" . $row_profile['image']; ?>" width="120px" height="120px" style="border-radius:50%;  padding: 5px;  border: 1px solid white;" alt="error">

                                    </div>
                                    <h3 class="f-w-600"><?php echo strtoupper($profile_name); ?></h3>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h5 class="m-b-10   f-w-600">INFORMATION</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600"><i class="fa-solid fa-envelope-circle-check fs-4 me-2 "></i>Email</p>
                                            <h5 class="text-muted f-w-400"><?php echo $profile_email; ?></h5>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600"><i class="fa-solid fa-phone fs-4 me-2"></i>Phone</p>
                                            <h5 class="text-muted f-w-400"><?php echo $profile_phone; ?></h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600"><i class="fa-solid fa-map-location-dot fs-4 me-2"></i>Address</p>
                                            <h5 class="text-muted f-w-400"><?php echo strtoupper($profile_address); ?></h5>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600"><i class="fa-solid fa-handshake fs-4 me-2"></i>Most Viewed</p>
                                            <h6 class="text-muted f-w-400">Dinoter husainm</h6>
                                        </div>
                                    </div>
                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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