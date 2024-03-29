<?php
include_once("header.php");
$stmt = "SELECT * FROM applicant INNER JOIN register ON applicant.u_id = register.id WHERE u_id = '$d_id'";
$result = mq($stmt);
if ($result){
    while ($row = mfa($result)) {
        $profileImg = $row['img'];
        $headerImg = $row['cover_img'];
        $name = $row['name'];
        $email = $row['email'];
        $bio = $row['bio'];
        $stud = $row['stud'];
        $phone = $row['num'];
        $location = $row['location'];
    }
}
else{
    die('Query execution failed: ' . mysqli_error($conn));
}
?>
<div class="container-fluid pt-4 px-4">
    <h2>Profile Overview</h2>
</div>
<!-- Profile Start-->
<?php
?>
<div class="container-fluid pt-3 px-4">
    <div>
        <div class="upper">
            <img src="<?=$current_url?>/<?= ($headerImg == '') ? 'uploads/default.webp' : $headerImg; ?>" class="img-fluid">
        </div>
        <div class="user">
            <div class="profile">
                <img src="<?=$current_url?>/<?= ($profileImg == '') ? 'uploads/user.jpg' : $profileImg; ?>" class="rounded-circle" width="80">
            </div>
        </div>
    </div>
    <div class="bg-light pt-5 d-flex justify-content-between px-3">
        <div>
            <h4 class="mb-0"><?= $name ?></h4>
            <span class="text-muted d-block mb-2"><?=$email?></span>
        </div>
        <div>
            <a href="<?=$current_url?>profile-details.php/<?=$id?>"><button class="btn btn-primary btn-sm follow">Edit profile</button></a>
        </div>
    </div>
</div>
<!-- Profile End -->


<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="h-100 bg-light rounded p-4">
                <div class="border-bottom py-2 mb-4">
                    <h5 class="mb-0">About Me</h5>
                    <!-- <a href="">Show All</a> -->
                </div>
                <div class="row g-4">
                    <div class="col-sm-12 col-md-12 col-xl-12 py-2">
                        <h5>Bio</h5>
                        <p><?= ($bio == '') ? 'none': $bio ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-12 py-2">
                        <h5>Studies</h5>
                        <p><?= ($stud == '') ? 'none': $stud ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Phone</h5>
                        <p><?= ($phone == '') ? 'none': $phone ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Email</h5>
                        <p><?= ($email == '') ? 'none': $email ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Location</h5>
                        <p><?= ($location == '') ? 'none': $location ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Website</h5>
                        <a>website.com.my</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h5 class="mb-0">Messages</h5>
                    <a href="">Show All</a>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="<?=$current_url?>/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="<?=$current_url?>/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="<?=$current_url?>/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center pt-3">
                    <img class="rounded-circle flex-shrink-0" src="<?=$current_url?>/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5 class="mb-0">Calender</h5>
                    <a href="">Show All</a>
                </div>
                <div id="calender"></div>
            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>