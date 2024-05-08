<?php

include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/connection.php');



if (!isset($_SESSION['id'])) {

    header('location:http://localhost/workspace/app_contact/login.php');

    exit;
}



$login_id = false;

if (isset($_SESSION['id'])) {
    $login_id = $_SESSION['id'];
    $table = "contact";

    $query = "SELECT * FROM $table WHERE author_id = $login_id ";
    $result = mysqli_query($connection, $query);
    $num_row = mysqli_num_rows($result);
}

// to fetch logedin users image
$base_url = 'http://localhost/workspace/app_contact';
$user_row = [];

$query_user = "SELECT * FROM users WHERE id = $login_id";

$result_user = mysqli_query($connection, $query_user);
$user_row[] = mysqli_fetch_assoc($result_user);
// print_r($user_row);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand " href="http://localhost/workspace/app_contact/home.php">
            <span>
                <?php foreach ($user_row as $key => $val) { ?>
                    <img src="<?php echo $base_url . '/uploads/' . $val['image']; ?> " width="50px" height="50px" style="border-radius:50%"  data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $val['email']  ?> " />
                <?php } ?>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mx-3  mb-lg-0 font-monospace fs-5 nav-tabs border-bottom-0 ">
                <li class="nav-item ">
                    <a class="nav-link " aria-current="page" href="http://localhost/workspace/app_contact/home.php">Home</a>
                </li>

                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Contacts(<?php echo $num_row; ?>)
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="http://localhost/workspace/app_contact/contact/add.php">ADD</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="http://localhost/workspace/app_contact/contact/list.php">List</a></li>

                    </ul>
                </li>

            </ul>
            <!-- search field -->

            <form class="d-flex" action="http://localhost/workspace/app_contact/contact/search_server.php" method="POST">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" required>
                <button class="btn btn-outline-info" type="submit">Search</button>
            </form>
        </div>
    </div>
    <button type="button" class="btn btn-outline-danger mx-2 fw-bold ">
        <a href="http://localhost/workspace/app_contact/logout.php" class="text-decoration-none  text-white">Logout</a>
    </button>

</nav>