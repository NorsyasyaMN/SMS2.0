<?php
include_once("header.php");
if (isset($_GET["s_id"])) {
    $s_id = $_GET["s_id"];
}
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_POST["submit"])){
        $a_name = $_POST["name"];
        $a_email = $_POST["email"];
        $a_phone = $_POST["phone"];
        $a_loc = $_POST["loc"];
        $a_gen = $_POST["gen"];
        $a_ic = $_POST["ic"];
        $a_occ = $_POST["occ"];
        $a_doc = $_POST["doc"];

        $stmt_i = "INSERT INTO `application`(`u_id`, `s_id`, `name`, `email`, `phone`, `loc`, `gen`, `ic`, `occ`, `doc`) VALUES ('$d_id','$s_id','$a_name','$a_email','$a_phone','$a_loc','$a_gen','$a_ic','$a_occ','$a_doc')";
        $result_a = mq($stmt_i);
        if($result){
            echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Succesfully applied.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        else{
            echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Error to applied the scholarship.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
}

$stmt = "SELECT * FROM scholarship INNER JOIN register ON scholarship.u_id = register.id WHERE scholarship.id = '$s_id'";
$result = mq($stmt);
if ($result) {
    while ($row = mfa($result)) {
        $email = $row['email'];
        $phone = $row['num'];
        $profileImg = $row['img'];
        $headerImg = $row['cover_img'];
        $name = $row['org_name'];
        $scholar_name = $row['scholar_name'];
        $bio = $row['bio'];
        $location = $row['location'];
        $field = $row['field'];
        $level = $row['level'];
        $criteria = $row['criteria'];
        $img1 = $row['img1'];
        $high = $row['high'];
        $awards = $row['award'];
        $img2 = $row['img2'];
        $doc = $row['doc'];
        $cat = $row['cat'];
    }
} else {
    die('Query execution failed: ' . mysqli_error($conn));
}
?>
<div class="container-fluid pt-4 px-4">
    <h2>Scholarship Details</Details>
    </h2>
</div>
<!-- Profile Start-->
<div class="container-fluid pt-3 px-4">
    <div>
        <div class="upper">
            <img src="<?= $current_url ?><?= $headerImg ?>" class="img-fluid">
        </div>
        <div class="user">
            <div class="profile">
                <img src="<?= $current_url ?><?= $profileImg ?>" class="rounded-circle" width="80">
            </div>
        </div>
    </div>
    <div class="bg-light pt-5 d-flex justify-content-between px-3">
        <div>
            <h4 class="mb-0"><?= $scholar_name ?></h4>
            <span class="text-muted d-block mb-2"><?= $email ?></span>
        </div>
        <div>
            <button><i class="far fa-bookmark" width="16" height="16"></i></button>
            <a href="<?= $current_url ?>scholarship-application.php?s_id=<?=$s_id?>"><button class="btn btn-primary btn-sm follow w-auto">Apply Scholarship</button></a>
        </div>
    </div>
</div>
<!-- Profile End -->


<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-6">
            <div class="h-100 bg-light rounded p-4">
                <div class="border-bottom py-2 mb-4">
                    <h5 class="mb-0">About Us</h5>
                    <!-- <a href="">Show All</a> -->
                </div>
                <div class="row g-4">
                    <div class="col-sm-12 col-md-12 col-xl-12 py-2">
                        <h5>Bio</h5>
                        <p><?= $bio ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Field</h5>
                        <p><?= $field ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Level</h5>
                        <?php
                        $stmt_l = "SELECT * FROM `level` WHERE id IN ($level)";
                        $result_l = mq($stmt_l);
                        $name_level  = array();
                        if ($result_l) {
                            while ($row = mfa($result_l)) {
                                $name_level[] = $row['level'];
                            }
                            $combinedLevel = implode(", ", $name_level);
                            echo "<p>$combinedLevel</p>";
                        }
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Categories</h5>
                        <?php
                        $stmt_c = "SELECT * FROM `cat` WHERE id IN ($cat)";
                        $result_c = mq($stmt_c);
                        $name_cat  = array();
                        if ($result_c) {
                            while ($row = mfa($result_c)) {
                                $name_cat[] = $row['cat'];
                            }
                            $combinedCat = implode(", ", $name_cat);
                            echo "<p>$combinedCat</p>";
                        }
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Phone</h5>
                        <p><?= $phone ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Email</h5>
                        <p><?= $email ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Location</h5>
                        <p><?= $location ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-2 border-bottom py-2">
                    <h5 class="mb-0">Interview</h5>
                    <a href="">Show All</a>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="<?= $current_url ?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="<?= $current_url ?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="<?= $current_url ?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center pt-3">
                    <img class="rounded-circle flex-shrink-0" src="<?= $current_url ?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
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
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="h-100 bg-light rounded p-4">
                <div class="border-bottom py-2 mb-4">
                    <h5 class="mb-0">Highlights and Criteria</h5>
                    <!-- <a href="">Show All</a> -->
                </div>
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <h5>Criteria</h5>
                        <ul class="ps-3">
                            <p><?= $criteria ?></p>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <img class="img-fluid" src="<?= $current_url ?>/<?= $img1 ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <img class="img-fluid" src="<?= $current_url ?>/<?= $img2 ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="pb-3">
                            <h5>Highlights</h5>
                            <p><?= $high ?></p>
                        </div>
                        <div class="pb-3">
                            <h5>Awards</h5>
                            <p><?= $awards ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th width="30" scope="col">No</th>
                            <th scope="col">Document</th>
                            <th width="30" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        $stmt = "SELECT * FROM `file` WHERE id IN ($doc)";
                        $result = mq($stmt);
                        if ($result) {
                            while ($row = mfa($result)) {
                                $doc_id = $row['id'];
                                $name = $row['name'];
                                $file = $current_url . $row['doc']; ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $name ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="<?= $file ?>" target="_blank">View</a></td>
                                </tr>
                        <?php
                                $count++;
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>