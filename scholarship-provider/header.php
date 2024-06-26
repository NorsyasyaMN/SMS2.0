<?php
session_start();
include_once("../config.php");
$ver = rand();
$current_url = "http://localhost/SMS2.0/scholarship-provider/";
$file_url = "http://localhost/SMS2.0/";

$id = userSID('scholarship-provider');
$d_id = decode($id);
global $d_id;
global $id;

$stmt = "SELECT * FROM `scholarship` INNER JOIN register ON scholarship.u_id = register.id WHERE u_id = '$d_id'";
$result = mq($stmt);
if ($result) {
    while ($row = mfa($result)) {
        $profileImg = $row['img'];
        $uname = $row['uname'];
        $user = $row['user'];
    }
} else {
    die('Query execution failed: ' . mysqli_error($conn));
}

$display = "d-none";
$display_p = "d-none";

global $display;
global $display_p;

if (isset($_GET["p_id"])) {
    $id_number = $_GET["p_id"];
    $id_parts = explode('/', $id_number);

    // Extract the first part which contains the number
    $s_id = $id_parts[0];

    global $s_id;

    $stmt_chk = "SELECT * FROM `user` WHERE id = '$s_id' AND role = 'Clerk'";
    $result_chk = mq($stmt_chk);
    if ($result_chk) {
        if (mnr($result_chk) > 0) {
            $display = "d-block";
        }
    }
} else {
    $display_p = "d-block";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SMS-Scholarship Provider</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <!-- <link href="../img/favicon.ico" rel="icon"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= $file_url ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= $file_url ?>lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= $file_url ?>css/bootstrap.min.css?ver=<?= $ver ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= $file_url ?>css/style.css?ver=<?= $ver ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= $file_url ?>css/virtual-select.min.css?ver=<?= $ver ?>">

    <!-- Tinymice CDN -->
    <script src="https://cdn.tiny.cloud/1/i1ce9mw87iqm1iez5quls4fsyr4rn8bqn1ygslug8ain5um8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>
    <div class="position-relative bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar">
                <a href="<?= $current_url ?>scholar.php/<?= $id ?>" class="navbar-brand mx-4 mb-3 d-flex justify-content-between align-items-center">
                    <img src="<?= $file_url ?>img/scholar.png" style="width:auto; height:50px">
                    <h3 class="text-primary mb-0 ms-2">SMS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?= $file_url ?>/<?= ($profileImg == '') ? 'uploads/user.jpg' : $profileImg; ?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?= $uname ?></h6>
                        <span><?= $user ?></span>
                    </div>
                </div>
                <div class="w-100">
                    <ul class="navbar-nav <?= $display_p ?>">
                        <li class="nav-item active">
                            <a href="<?= $current_url ?>scholar.php/<?= $id ?>" class="nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $current_url ?>applicant.php/<?= $id ?>" class="nav-link"><i class="fa fa-user-graduate me-2"></i>Applicants List</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $current_url ?>document.php/<?= $id ?>" class="nav-link"><i class="fa fa-file me-2"></i>Document</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $current_url ?>user.php/<?= $id ?>" class="nav-link"><i class="fa fa-users me-2"></i>Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $current_url ?>setting.php/<?= $id ?>" class="nav-link"><i class="fa fa-cogs me-2"></i>Setting</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav <?= $display ?>">
                        <li class="nav-item active">
                            <a href="<?= $current_url ?>scholar.php?p_id=<?= $s_id ?>/<?= $id ?>" class="nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $current_url ?>applicant.php?p_id=<?= $s_id ?>/<?= $id ?>" class="nav-link"><i class="fa fa-th me-2"></i>Applicants List</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-darkblue border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?= $file_url ?>/<?= ($profileImg == '') ? 'uploads/user.jpg' : $profileImg; ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?= $uname ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-darkblue border-0 rounded-0 rounded-bottom m-0">
                            <a href="<?= $current_url ?>scholar.php/<?= $id ?>" class="dropdown-item <?= $display_p ?>">My Profile</a>
                            <!-- <a href="#" class="dropdown-item">Settings</a> -->
                            <a href="<?= $file_url ?>login.php" onclick="<?php session_destroy(); ?>" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->