<?php
include($_SERVER['DOCUMENT_ROOT'] . '/workspace/app_contact/connection.php');

$success = false;
$error = false;
$search_keyword = false;

if (isset($_SESSION['success'])) {
    $success_req = $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

if (isset($_SESSION["keyword"])) {
    $search_keyword = $_SESSION["keyword"];
    unset($_SESSION["keyword"]);
}
// echo $search_keyword;

$count = 0;
$limit = 5;
$page = 1;
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $_GET['page'];
}
// offset
$offset = ($page - 1) * $limit;

$base_url = 'http://localhost/workspace/app_contact';
$users = [];
$login_user_id = false;
if (isset($_SESSION['id'])) {
    $login_user_id = $_SESSION['id'];
    $where = ' WHERE contact.author_id = ' . $login_user_id;

    if ($search_keyword) {

        $where = $where . ' AND  (`contact`.`name` LIKE  "%' . $search_keyword . '%"  OR `contact`.`email` LIKE "%' . $search_keyword . '%" OR `contact`.`phone` LIKE "%' . $search_keyword . '%")';
    }
    // pagination query
    $query_pagination = "SELECT users.name as user_name,users.id as user_id, contact.name as contact_name,contact.email,contact.id as contact_id, contact.image ,contact.phone,contact.address FROM users INNER JOIN contact ON users.id=contact.author_id $where LIMIT $limit OFFSET $offset";
    $result_pagination = mysqli_query($connection, $query_pagination);


    $query_inner = "SELECT users.name as user_name,users.id as user_id, contact.name as contact_name,contact.email,contact.id as contact_id, contact.image ,contact.phone,contact.address FROM users INNER JOIN contact ON users.id=contact.author_id  " . $where;

    $result_inner = mysqli_query($connection, $query_inner);

    $count = mysqli_num_rows($result_inner);
    while ($row = mysqli_fetch_assoc($result_pagination)) {
        $users[] = $row;
    }
    // pagination 
    $total_rows = $count;
    $num_of_pages = ceil($total_rows / $limit);
}


// echo "<pre>";
// print_r($users);
// echo "</pre>";  die;

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
    <!--session success message  -->
    <?php if ($success) { ?>
        <div class="alert alert-success text-center ">
            <p><?php echo $success; ?></p>
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
                <?php echo $error;  ?>
            </div>
        <?php } ?>
    <?php } ?>

    <!-- ------------------------------ -->
    <div class="container" style=" min-height: 100vh;">
        <div class="container">
            <h2 class="text-center my-3 font-monospace ">List</h2>

            <table class="table table-hover table-dark  table-bordered table my-5 ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($users as $key => $val) { ?>

                        <tr>
                            <th scope="row"><?php echo $val['contact_id']; ?></th>
                            <td>
                                <img src="<?php echo $base_url . '/uploads/' . $val['image']; ?>" width="50px" height="50px" style="border-radius:50%" />
                            </td>
                            <td><?php echo $val['contact_name']; ?></td>
                            <td><?php echo $val['email']; ?></td>
                            <td><?php echo $val['address']; ?></td>
                            <td><?php echo $val['phone']; ?></td>
                            <td><?php echo $val['user_name']; ?></td>
                            <td>
                                <button class="btn btn-outline-primary" type="button">
                                    <a class="text-decoration-none text-white fw-bold font-monospace  " href="http://localhost/workspace/app_contact/contact/edit.php?id=<?php echo $val['contact_id']; ?>">Edit</a>
                                </button>
                                <button class="btn btn-outline-danger" type="button">
                                    <a class="text-decoration-none text-white fw-bold font-monospace  " href="http://localhost/workspace/app_contact/contact/delete.php?id=<?php echo $val['contact_id']; ?>">Delete</a>
                                </button>
                            </td>
                        </tr>

                    <?php } ?>


                </tbody>
            </table>
            <!-- pagination -->
            <nav class="d-flex justify-content-center ">
                <?php for ($i = 1; $i <= $num_of_pages; $i++) { ?>
                    <ul class="pagination pagination-md">
                        <?php if ($i == $page) { ?>
                            <?php $active = "bg-primary text-white fw-bold font-monospace "; ?>
                        <?php } else {
                            $active = " ";
                        } ?>
                        <li class="page-item me-1 ">
                            <a style="border: whitesmoke;  border-radius:50%; border-style: outset; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;" class="page-link <?php echo $active; ?>" href="http://localhost/workspace/app_contact/contact/list.php?page=<?php echo $i ?>">
                                <?php echo $i ?>
                            </a>
                        </li>
                    </ul>
                <?php } ?>
            </nav>
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