<?php
include_once("../config.php");
$ver = rand();
$current_url = "http://localhost/SMS2.0/applicant/";
$reset_link = "http://localhost/SMS2.0/reset-password.php";
$alert = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["reset"])) {

        $email = $_POST["email"];

        $stmt_check = "SELECT * FROM register WHERE email = '$email'";
        $result_check = mq($stmt_check);
        if ($result_check) {
            if (mnr($result_check) > 0) {
                // Send Email
                $to = "$email"; // User's email address
                $subject = "Password Reset Request";
                $message = "Hello,\n\n";
                $message .= "You have requested to reset your password. Please click on the following link to reset your password:\n";
                $message .= $reset_link;
                $message .= "\n\nIf you did not request this, please ignore this email.\n";
                $headers = "From: nmnorsyasya64gmail.com"; // Replace with your email address

                // Send the email
                $mail_sent = mail($to, $subject, $message, $headers);

                if ($mail_sent) {
                    $alert = '<div class="alert alert-success alert-dismissible fade show col-4" role="alert">Email is successfully sent!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else {
                    $alert = '<div class="alert alert-danger alert-dismissible fade show col-4" role="alert">Email failed to sent!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
            } else {
                $alert = '<div class="alert alert-danger alert-dismissible fade show col-4" role="alert">Email is not yet registered, Please register your email.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
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
    <div class="container min-vw-100 min-vh-100" style="background-color: #212b36;">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <div>
            <div class="row">
                    <?= $alert ?>
                <div>
                    <div class="col-12 col-md-8 col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h5>Forgot Password?</h5>
                                    <p class="mb-2">Enter your registered email ID to reset the password
                                    </p>
                                </div>
                                <form method="post" action="">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email" required="">
                                    </div>
                                    <div class="mb-3 d-grid">
                                        <button type="submit" name="reset" class="btn btn-dark w-auto">
                                            Reset Password
                                        </button>
                                    </div>
                                    <span>Don't have an account? <a href="register.php">sign in</a></span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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