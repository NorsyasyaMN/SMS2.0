<?php
include_once("header.php");
$stmt = "SELECT * FROM scholarship INNER JOIN register ON scholarship.u_id = register.id WHERE u_id = '$d_id'";
$result = mq($stmt);
if ($result){
    while ($row = mfa($result)) {
        $email = $row['email'];
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
    }
}
else{
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
            <img src="<?=$file_url?>/<?= $headerImg ?>" class="img-fluid">
        </div>
        <div class="user">
            <div class="profile">
                <img src="<?=$file_url?>/<?= $profileImg ?>" class="rounded-circle" width="80">
            </div>
        </div>
    </div>
    <div class="bg-light pt-5 d-flex justify-content-between px-3">
        <div>
            <h4 class="mb-0">MMU Scholarship</h4>
            <span class="text-muted d-block mb-2">Los Angles</span>
        </div>
        <div>
            <a href="<?= $current_url ?>profile-details.php/<?=$id?>"><button class="btn btn-primary btn-sm follow w-auto">Edit Scholarship</button></a>
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
                    <div class="col-sm-12 col-md-12 col-xl-12 py-2">
                        <h5>Field</h5>
                        <p><?= $field?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-12 py-2">
                        <h5>Level</h5>
                        <p><?= $level ?></p>
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
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Website</h5>
                        <a>website.com.my</a>
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
                    <img class="rounded-circle flex-shrink-0" src="<?=$file_url?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="<?=$file_url?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="<?=$file_url?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center pt-3">
                    <img class="rounded-circle flex-shrink-0" src="<?=$file_url?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
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
                            <p><?=$criteria?></p>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <img class="img-fluid" src="<?=$file_url?>img/sample1.jpg">
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <img class="img-fluid" src="<?=$file_url?>img/sample1.jpg">
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="pb-3">
                            <h5>Highlights</h5>
                            <p><?=$high?></p>
                        </div>
                        <div class="pb-3">
                            <h5>Awards</h5>
                            <p><?=$awards?></p>
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
                        <tr>
                            <td>1</td>
                            <td>INV-0123</td>
                            <td><a class="btn btn-sm btn-primary" href="">Download</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>INV-0123</td>
                            <td><a class="btn btn-sm btn-primary" href="">Download</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>INV-0123</td>
                            <td><a class="btn btn-sm btn-primary" href="">Download</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>INV-0123</td>
                            <td><a class="btn btn-sm btn-primary" href="">Download</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>INV-0123</td>
                            <td><a class="btn btn-sm btn-primary" href="">Download</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>