<?php include_once("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $oname_r = $_POST["o_name"];
    $sname_r = $_POST["s_name"];
    $bio_r = $_POST["bio"];
    $loc_r = $_POST["loc"];
    $phone_r = $_POST["phone"];
    $email_r = $_POST["email"];
    $field_r = $_POST["field"];
    $level_r = $_POST["level"];
    $criteria =$_POST["criteria"];
    $high =$_POST["high"];
    $award =$_POST["award"];
    $status = 0;

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

    // Check if profile image is set
    if (isset($_FILES["profileImage"]) && $_FILES["profileImage"]["error"] == 0) {
        $profilePath = uploadPhoto($_FILES["profileImage"]);
        if ($profilePath !== false) {
            // Profile image is set, update database with profile image

            $result = mq("UPDATE `register` SET `name`='$name_r', `email`='$email_r', `num`='$phone_r', `img`='$profilePath', `bio`='$bio_r', `stud`='$stud_r', `location`='$loc_r' WHERE id = $d_id");
            if ($result == TRUE) {
                $status = 1;
            }
        } else {
            // Display error message if profile image upload fails
            $status = 0;
            echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error uploading profile image.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }

    // Check if header image is set
    if (isset($_FILES["headerImage"]) && $_FILES["headerImage"]["error"] == 0) {
        $headerPath = uploadPhoto($_FILES["headerImage"]);
        if ($headerPath !== false) {
            // Header image is set, update database with header image
            $result = mq("UPDATE `register` SET `name`='$name_r', `email`='$email_r', `num`='$phone_r', `cover_img`='$headerPath', `bio`='$bio_r', `stud`='$stud_r', `location`='$loc_r' WHERE id = $d_id");
            if ($result == TRUE) {
                $status = 1;
            }
        } else {
            // Display error message if header image upload fails
            $status = 0;
            echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error uploading header image.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    } else {
        $result = mq("UPDATE `register` SET `name`='$name_r', `email`='$email_r', `num`='$phone_r', `bio`='$bio_r', `stud`='$stud_r', `location`='$loc_r' WHERE id = $d_id");
        if ($result == TRUE) {
            $status = 1;
        } else {
            // Display error message if database update fails
            $status = 0;
            echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error updating data.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }

    if ($status == 1) {
        echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Data saved successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

$stmt = "SELECT * FROM scholarship INNER JOIN register ON scholarship.u_id = register.id WHERE u_id = '$d_id'";
$result = mq($stmt);
while ($row = mfa($result)) {
    $email = $row['email'];
    $phone = $row['num'];
    $profileImg = $row['img'];
    $headerImg = $row['cover_img'];
    $org_name = $row['org_name'];
    $scholar_name = $row['scholar_name'];
    $bio = $row['bio'];
    $location = $row['location'];
    $field = $row['field'];
    $level = $row['level'];
    $criteria = $row['criteria'];
    $img1 = $row['img1'];
    $high = $row['high'];
    $award = $row['award'];
    $img2 = $row['img2'];
}
?>
<div class="container-fluid pt-4 px-4">
    <h2>Applicant Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form action="" method="post" enctype="multipart/form-data">
        <!-- General Settings -->
        <div class="mb-3 bg-light rounded p-4">
            <h5>Applicant Information</h5>
            <p>Update some personal information. The data will never be publicly available.</p>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Profile Photo:</label>
                <div class="col-sm-10">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle me-3" src="<?= $file_url ?>/<?= $profileImg ?>" alt="" style="width: 40px; height: 40px;">
                        <input type="file" name="profileImage" id="profileImage" accept="image/*">
                        <a class="btn btn-outline-primary btn-sm follow w-auto me-3">Remove</a>
                    </div>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Cover Photo:</label>
                <div class="col-sm-10">
                    <div id="drag-drop-area" class="mb-3">
                        <p>Drag & drop your file here or <label for="file-input" class="text-primary">browse</label>.</p>
                        <input type="file" name="headerImage" id="headerImage" accept="image/*">
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Information -->
        <div class="mb-3 bg-light rounded p-4">
            <h5>Basic Information</h5>
            <p>Update some personal information. The data will never be publicly available.</p>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Organization Name:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter organization name" name="o_name" value="<?=$org_name?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Scholarship Name:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter scholarship name" name="s_name" value="<?=$scholar_name?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Bio:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter bio" name="bio" value="<?=$bio?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Location:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter your location" name="loc" value="<?=$location?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Phone:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter your number" name="phone" value="<?=$phone?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter your email" name="email" value="<?=$email?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Field Study Applicable:</label>
                <div class="col-sm-10">
                    <div class="d-none">
                        <input class="form-control" placeholder="Add field" type='text' name='option' id='option' />
                        <button class="btn btn-sm btn-primary w-auto" id='btnAdd'>Add Option</button>
                    </div>
                    <select class="form-select form-control bg-white" id="sel" name="sel">
                        <option value="">Other</option>
                    </select>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Course Level Applicable:</label>
                <div class="col-sm-10">
                    <div class="d-none">
                        <input class="form-control" placeholder="Add field" type='text' name='option' id='option' />
                        <button class="btn btn-sm btn-primary w-auto" id='btnAdd'>Add Option</button>
                    </div>
                    <select class="form-select form-control bg-white" id="sel" name="sel">
                        <option value="">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- Scholarship Details -->
        <div class="mb-3 bg-light rounded p-4">
            <h5>Scholarship Details</h5>
            <p>Update some personal information. The data will never be publicly available.</p>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Criteria:</label>
                <div class="col-sm-10">
                    <textarea id="editor" class="editor" name="criteria" placeholder="Enter your text here..."></textarea>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Photo 1:</label>
                <div class="col-sm-10">
                    <div id="drag-drop-area" class="mb-3">
                        <p>Drag & drop your file here or <label for="file-input" class="text-primary">browse</label>.</p>
                        <input type="file" id="file-input" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Highlights:</label>
                <div class="col-sm-10">
                    <textarea id="editor" class="editor" name="high" placeholder="Enter your text here..."></textarea>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Highlights:</label>
                <div class="col-sm-10">
                    <textarea id="editor" class="editor" name="award" placeholder="Enter your text here..."></textarea>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Photo 2:</label>
                <div class="col-sm-10">
                    <div id="drag-drop-area" class="mb-3">
                        <p>Drag & drop your file here or <label for="file-input" class="text-primary">browse</label>.</p>
                        <input type="file" id="file-input" accept="image/*">
                    </div>
                </div>
            </div>
        </div>
        <!-- Display Document -->
        <div class="mb-3 bg-light rounded p-4">
            <h5>Document Display</h5>
            <p>Document to be downloaded by the applicant</p>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Document Name:</label>
                <div class="col-sm-10">
                    <select id="role" class="form-select form-control bg-white">
                        <option selected>Select Document</option>
                        <option value="1">INV-0123</option>
                        <option value="1">INV-0123</option>
                        <option value="1">INV-0123</option>
                        <option value="1">INV-0123</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- <div class="mb-3 bg-light rounded p-4">
            <h5>Document Needed</h5>
            <p>How many document needed to be upload by the applicant, seperate it by comma</p>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Document Name:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="document" class="document" name="document" placeholder="Document"></input>
                </div>
            </div>
        </div> -->
        <div class="d-flex justify-content-between ">
            <a class="btn btn-sm btn-outline-dark w-auto" href="index.php">Cancel</a>
            <a class="btn btn-sm btn-primary w-auto" href="index.php">Save changes</a>
        </div>
    </form>
</div>
<!-- Widgets End -->

<?php include_once("footer.php") ?>