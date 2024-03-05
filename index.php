<?php include_once("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $bio = $_POST["bio"];
    $stud = $_POST["stud"];
    $phone = $_POST["phone"];
    $loc = $_POST["loc"];

    // Check if both profile and header images are uploaded
    if (isset($_FILES["profileImage"]) && isset($_FILES["headerImage"])) {
        $profile = $_FILES["profileImage"];
        $header = $_FILES["headerImage"];

        // Function to handle photo upload
        function uploadPhoto($photo)
        {
            if ($photo["error"] == UPLOAD_ERR_OK) {
                $file_name = basename($photo["name"]);
                $file_tmp = $photo["tmp_name"];
                $file_type = $photo["type"];
                $file_size = $photo["size"];

                // Store file in uploads directory
                $upload_dir = "uploads/";
                $target_file = $upload_dir . $file_name;
                move_uploaded_file($file_tmp, $target_file);

                return $target_file; // Return uploaded file path
            } else {
                return false; // Return false if upload failed
            }
        }

        // Upload profile photo
        $profilePath = uploadPhoto($profile);
        // Upload header photo
        $headerPath = uploadPhoto($header);

        // Check if both uploads were successful
        if ($profilePath !== false && $headerPath !== false) {
            // Insert file paths into database (adjust SQL query as needed)
            $result = mq("INSERT INTO `a_profile`(`img`, `cover_img`, `name`, `email`, `bio`, `stud`, `phone`, `location`) VALUES ('$profilePath','$headerPath','$name','$email','$bio','$stud','$phone','$loc')");
            if ($result === TRUE) {
                echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Data save successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show float-end col-4" role="alert">Error uploading data.</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        }
    } else {
        echo "Please select both profile and header images.";
    }
}

$result = mq('SELECT * FROM a_profile WHERE a_id = 2');
while($row = mfa($result)){
    $profileImg = $row['img'];
    $headerImg = $row['cover_img'];
    $name = $row['name'];
    $email = $row['email'];
    $bio = $row['bio'];
    $stud = $row['stud'];
    $phone = $row['phone'];
    $location = $row['location'];
}


?>
<div class="container-fluid pt-4 px-4">
    <h2>Profile Overview</h2>
</div>
<!-- Profile Start-->
<div class="container-fluid pt-3 px-4">
    <div>
        <div class="upper">
            <img src="<?=$headerImg?>" class="img-fluid">
        </div>
        <div class="user">
            <div class="profile">
                <img src="<?=$profileImg?>" class="rounded-circle" width="80">
            </div>
        </div>
    </div>
    <div class="bg-light pt-5 d-flex justify-content-between px-3">
        <div>
            <h4 class="mb-0"><?=$name?></h4>
            <span class="text-muted d-block mb-2">Los Angles</span>
        </div>
        <div>
            <a href="profile-details.php"><button class="btn btn-primary btn-sm follow">Edit profile</button></a>
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
                    <h5 class="mb-0">About Us</h5>
                    <!-- <a href="">Show All</a> -->
                </div>
                <div class="row g-4">
                    <div class="col-sm-12 col-md-12 col-xl-12 py-2">
                        <h5>Bio</h5>
                        <p><?=$bio?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-12 py-2">
                        <h5>Studies</h5>
                        <p><?=$stud?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Phone</h5>
                        <p><?=$phone?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Email</h5>
                        <p><?=$email?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Location</h5>
                        <p><?=$location?></p>
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
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center pt-3">
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
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