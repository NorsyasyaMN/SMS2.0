<?php
include_once("config.php");
$ver = rand();

$id = userID();
$d_id = decode($id);
global $d_id;
global $id;
$current_url = "http://localhost/SMS2.0/";
$stmt = "SELECT * FROM applicant INNER JOIN register ON applicant.u_id = register.id WHERE u_id = '$d_id'";
$result = mq($stmt);
if (!$result) {
    die('Query execution failed: ' . mysqli_error($conn));
}
while ($row = mfa($result)) {
    $profileImg = $row['img'];
    $uname = $row['uname'];
    $user = $row['user'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Scholarship One Stop Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <!-- <link href="img/favicon.ico" rel="icon"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?=$current_url?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?=$current_url?>lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=$current_url?>css/bootstrap.min.css?ver=<?= $ver ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?=$current_url?>/css/style.css?ver=<?= $ver ?>" rel="stylesheet">
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
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">SMS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?=$current_url?><?= ($profileImg == '') ? 'uploads/user.jpg' : $profileImg; ?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?= $uname ?></h6>
                        <span><?= $user ?></span>
                    </div>
                </div>
                <div class="w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a href="<?= $current_url ?>index.php/<?=$id?>" class="nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $current_url ?>application.php/<?=$id?>" class="nav-link"><i class="fa fa-th me-2"></i>Application History</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $current_url ?>document.php/<?=$id?>" class="nav-link"><i class="fa fa-keyboard me-2"></i>Document</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $current_url ?>scholarship.php/<?=$id?>" class="nav-link"><i class="fa fa-table me-2"></i>Scholarship</a>
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
                            <img class="rounded-circle me-lg-2" src="<?=$current_url?>/<?= ($profileImg == '') ? 'uploads/user.jpg' : $profileImg; ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?= $uname ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-darkblue border-0 rounded-0 rounded-bottom m-0">
                            <a href="<?= $current_url ?>index.php/<?=$id?>" class="dropdown-item">My Profile</a>
                            <!-- <a href="#" class="dropdown-item">Settings</a> -->
                            <a href="<?=$current_url?>login.php" class="dropdown-item" onclick="<?php session_destroy(); ?>">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->