<?php
include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/connection.php');

// echo $_SESSION['id'];
$base_url = 'http://localhost/workspace/app_contact';

$login_user_id = false;
$users_card = [];
if (isset($_SESSION['id'])) {
    $login_user_id = $_SESSION['id'];

    $query_cards = "SELECT * FROM contact WHERE author_id=$login_user_id  ";
    $result_cards = mysqli_query($connection, $query_cards);
    // $no_rows = mysqli_num_rows($result_cards);
    // echo $no_rows;
    while ($each_row = mysqli_fetch_assoc($result_cards)) {
        $users_card[] = $each_row;
    }
}
// print_r($users_card)




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
    <!-- main container -->
    <!-- contacts  profile links -->

    <div class="container" style=" min-height: 100vh;">
        <h1 class="text-center my-4 ">My Contacts </h1>
        <hr>
        <!-- users added contact cards -->
        <div class="row row-cols-1 row-cols-md-4 g-4 my-3">

            <?php foreach ($users_card as $key => $value) { ?>

                <div class="col ">
                    <a href="http://localhost/workspace/app_contact/contact/profile.php?id=<?php echo $value['id']; ?>" class="text-decoration-none">
                        <div class="card " data-bs-toggle="tooltip" data-bs-placement="bottom" title="view more" style=" background-color: white;  border-top:5px solid black;  " onmouseover="this.style.boxShadow='0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)';" onmouseout="this.style.boxShadow='none';">
                            <div class="card-body">
                                <!-- <i class="fa-regular fa-user"></i> -->
                                <h3 class="card-title  text-center "><i class="fa-regular fa-user fs-3 me-3  "></i><?php echo $value['name'] ?></h3>
                            </div>

                        </div>

                    </a>
                </div>
            <?php } ?>

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