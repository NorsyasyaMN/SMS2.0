<?php
include_once("config.php");
$ver = rand();
$current_url = "http://localhost/SMS2.0/";
$alert = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // this part is from register.php which is another file
    if (isset($_POST['register'])) {
        $name = $_POST["name"];
        $uname = $_POST["uname"];
        $email = $_POST["email"];
        $num = $_POST["num"];
        $pass = $_POST["pass"];
        $rpass = $_POST["rpass"];
        $user = $_POST["user"];

        if ($rpass == $pass) {
            $result = mq("INSERT INTO `register`(`name`, `uname`,`email`, `num`, `pass`, `user`) VALUES ('$name', '$uname','$email','$num','$pass','$user')");
            if ($result === TRUE) {
                $alert = '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Data save successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
                $alert = '<div class="alert alert-warning alert-dismissible fade show float-end col-4" role="alert">Error uploading data.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        } else {
            $alert = '<div class="alert alert-warning alert-dismissible fade show float-end col-4" role="alert">Password is not the same<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }


    //this part is from login.php which is this file
    if (isset($_POST['pass_r']) && isset($_POST['email_r'])) {
        $email = $_POST['email_r'];
        $pass = $_POST['pass_r'];
        $stmt = "SELECT * FROM `register` WHERE email = '$email' AND pass = '$pass'";
        $result = mq($stmt);
        if ($result) {
            if (mnr($result) > 0) {
                // Check if there are any rows returned
                $row = mfa($result);
                $id = $row['id'];
                $user = $row['user'];
                $e_id = encode($id);

                if($user == 'Applicant'){
                    $stmt_a = "INSERT INTO `applicant`(`u_id`, `img`, `cover_img`, `bio`, `stud`, `location`) VALUES ('$id','uploads/user.jpg','uploads/default.webp','','','')";
                    $result_a = mq($stmt_a);
                    if($result_a){
                        header('Location: index.php/' . $e_id);
                    }
                }
                if($user == 'Scholarship Provider'){
                    $stmt_s = "INSERT INTO `scholarship`(`u_id`, `img`, `cover_img`, `org_name`, `scholar_name`, `bio`, `location`, `field`, `level`, `criteria`, `img1`, `high`, `award`, `img2`, `doc`) VALUES ('$id','uploads/user.jpg','uploads/default.webp','','','','','','','','','','','','')";
                    $result_s = mq($stmt_s);
                    if($result_s){
                        header('Location: scholarship-provider/scholar.php/' . $e_id);
                    }
                }
                // Set session variable and redirect the user
            } else {
                // Display error message if login fails
                $alert = '<div class="alert alert-warning alert-dismissible fade show float-end col-4" role="alert">Wrong Credentials<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        } else {
            // Display error message if login fails
            $alert = '<div class="alert alert-warning alert-dismissible fade show float-end col-4" role="alert">Failed to login<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
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
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css?ver=<?= $ver ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css?ver=<?= $ver ?>" rel="stylesheet">
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

        <?= $alert ?>
        <section class="vh-100" style="background-color: #9A616D;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="login.php" method="post" enctype="multipart/form-data">

                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                <span class="h1 fw-bold mb-0">Logo</span>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                            <div class="form-outline mb-4">
                                                <input type="email" id="email" class="form-control form-control-lg" name="email_r" autofocus />
                                                <label class="form-label" for="email">Email address</label>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="password" id="password" class="form-control form-control-lg" name="pass_r" />
                                                <label class="form-label" for="password">Password</label>
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Login</button>
                                            </div>

                                            <a class="small text-muted" href="#!">Forgot password?</a>
                                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php" style="color: #393f81;">Register here</a></p>
                                            <a href="#!" class="small text-muted">Terms of use.</a>
                                            <a href="#!" class="small text-muted">Privacy policy</a>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="img/img1.webp" alt="login form" class="img-fluid" style="border-radius: 0 1rem 1rem 0;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js?ver=<?= $ver ?>"></script>

</body>

</html>