<?php
include_once("header.php");
$stmt = "SELECT * FROM applicant INNER JOIN register ON applicant.u_id = register.id WHERE u_id = '$d_id'";
$result = mq($stmt);
if ($result) {
    while ($row = mfa($result)) {
        $profileImg = $row['img'];
        $headerImg = $row['cover_img'];
        $name = $row['name'];
        $email = $row['email'];
        $bio = $row['bio'];
        $stud = $row['stud'];
        $phone = $row['num'];
        $location = $row['location'];
        $level  = $row['level'];
    }
} else {
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
            <img src="<?= $file_url ?>/<?= ($headerImg == '') ? 'uploads/default.webp' : $headerImg; ?>" class="img-fluid">
        </div>
        <div class="user">
            <div class="profile">
                <img src="<?= $file_url ?>/<?= ($profileImg == '') ? 'uploads/user.jpg' : $profileImg; ?>" class="rounded-circle" width="80">
            </div>
        </div>
    </div>
    <div class="bg-light pt-5 d-flex justify-content-between px-3">
        <div>
            <h4 class="mb-0"><?= $name ?></h4>
            <span class="text-muted d-block mb-2"><?= $email ?></span>
        </div>
        <div>
            <a href="<?= $current_url ?>profile-details.php/<?= $id ?>"><button class="btn btn-primary btn-sm follow">Edit profile</button></a>
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
                        <p><?= ($bio == '') ? 'none' : $bio ?></p>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 py-2">
                        <h5>Field of Studies</h5>
                        <?php
                        if ($stud == '') {
                            echo "<p>none</p>";
                        } else {
                            $stmt_f = "SELECT * FROM `field` WHERE id IN ($stud)";
                            $result_f = mq($stmt_f);
                            if ($result_f) {
                                while ($row = mfa($result_f)) {
                                    $name_field = $row['field'];
                                }
                                echo "<p>$name_field</p>";
                            }
                        }
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 py-2">
                        <h5>Level of Studies</h5>
                        <?php
                        if ($level == '') {
                            echo "<p>none</p>";
                        } else {
                            $stmt_l = "SELECT * FROM `level` WHERE id IN ($level)";
                            $result_l = mq($stmt_l);
                            if ($result_l) {
                                while ($row = mfa($result_l)) {
                                    $name_level = $row['level'];
                                }
                                echo "<p>$name_level</p>";
                            }
                        }
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 py-2">
                        <h5>Phone</h5>
                        <p><?= ($phone == '') ? 'none' : $phone ?></p>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 py-2">
                        <h5>Email</h5>
                        <p><?= ($email == '') ? 'none' : $email ?></p>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 py-2">
                        <h5>Location</h5>
                        <p><?= ($location == '') ? 'none' : $location ?></p>
                    </div>
                    <!-- <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Website</h5>
                        <a>website.com.my</a>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h5 class="mb-0">List of Interview</h5>
                </div>
                <?php
                $stmt_i = "SELECT * FROM `application` INNER JOIN `scholarship` ON application.s_id = scholarship.u_id WHERE application.u_id = $d_id AND application.iv_date > CURDATE()";
                $result_i = mq($stmt_i);
                if ($result_i) {
                    if (mnr($result_i) > 0) {
                        while ($row = mfa($result_i)) {
                            $iv_link = $row['iv_link'];
                            $iv_date = $row['iv_date'];
                            $img = $row['img'];
                            $s_name = $row['scholar_name'];
                ?>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="<?= $current_url ?><?= $img ?>" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1"><?= $s_name ?></h6>
                                    </div>
                                    <p class="mb-0"><i class="fa fa-link me-2" aria-hidden="true"></i><?= $iv_link ?></p>
                                    <p class="mb-0"><i class="fa fa-calendar me-2" aria-hidden="true"></i> <?= $iv_date ?></p>
                                </div>
                            </div>
                <?php
                        }
                    }
                    else{
                        echo "<span>No interview listed</span>";
                    }
                }
                else{
                    echo "<span>No interview listed</span>";
                }
                ?>
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