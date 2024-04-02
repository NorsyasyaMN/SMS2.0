<?php
include_once("config.php");
$ver = rand();
$current_url = "http://localhost/SMS2.0/";

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

        <section style="background-color: #212b36;">
            <div class="container py-5 px-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-7 col-lg-7 col-xl-6 order-2 order-lg-1">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="<?= $current_url ?>img/scholar.png" style="width:auto; height:80px">
                                            <h3 class="text-primary mb-0 ms-2" style="font-size: 40px">SMS</h3>
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up your account</h5>

                                        <form class="mx-1 mx-md-4" method="post" action="login.php">

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="name">Fullname</label>
                                                    <input type="text" id="name" class="form-control" name="name" oninput="convertToUppercase(this)" required />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="name">Username</label>
                                                    <input type="text" id="uname" class="form-control" oninput="convertToUppercase(this)" name="uname" required />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="email">Your Email</label>
                                                    <input type="email" id="email" class="form-control" name="email" required />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="num">Your Number</label>
                                                    <input type="number" id="num" class="form-control" name="num" required />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="pass">Password</label>
                                                    <input type="password" id="pass" class="form-control" name="pass" required />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="rpass">Repeat your password</label>
                                                    <input type="password" id="rpass" class="form-control" name="rpass" required />
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="user">Register as</label>
                                                    <select class="form-select" id="user" aria-label="Floating label select example" name="user" required>
                                                        <option>Select user</option>
                                                        <option value="Applicant">Applicant</option>
                                                        <option value="Scholarship Provider">Scholarship Provider</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-check d-flex justify-content-center mb-5">
                                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required />
                                                <label class="form-check-label" for="form2Example3c">
                                                    I agree all statements in <a href="#!">Terms of service</a>
                                                </label>
                                            </div>
                                            <p class="mb-3 d-flex justify-content-center" style="color: #393f81;">Already have an account? <a href="login.php" style="color: #393f81;"> Login here</a></p>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" name="register" class="btn btn-dark btn-lg w-auto">Register</button>
                                            </div>

                                        </form>

                                    </div>
                                    <div class="col-md-5 col-lg-5 col-xl-6 d-flex align-items-center order-1 order-lg-2">
                                        <img src="img/img1.webp" class="img-fluid" alt="Sample image" style="border-radius: 0 1rem 1rem 0;">
                                    </div>
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