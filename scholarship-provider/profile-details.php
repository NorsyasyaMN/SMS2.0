<?php include_once("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name_r = $_POST["name"];
    $oname_r = $_POST["o_name"];
    $sname_r = $_POST["s_name"];
    $bio_r = $_POST["bio"];
    $loc_r = $_POST["loc"];
    $phone_r = $_POST["phone"];
    $email_r = $_POST["email"];
    $field_r = $_POST["field"];
    $level_r = $_POST["level"];
    $cat_r = $_POST["cat"];
    $criteria = $_POST["criteria"];
    $high = $_POST["high"];
    $award = $_POST["award"];
    $doc = $_POST["native-select"];
    $status = 0;

    // Check if profile image is set
    if (isset($_FILES["profileImage"]) && $_FILES["profileImage"]["error"] == 0) {
        $profilePath = uploadPhotoScholar($_FILES["profileImage"]);
        if ($profilePath !== false) {
            // Profile image is set, update database with profile image
            $profile_clean = str_replace("../", "", $profilePath);
            $stmt_c = "UPDATE `scholarship` SET `img`='$profile_clean' WHERE u_id = $d_id ";
            $result_c = mq($stmt_c);
            if ($result_c == TRUE) {
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
        $headerPath = uploadPhotoScholar($_FILES["headerImage"]);
        if ($headerPath !== false) {
            // Header image is set, update database with header image
            $header_clean = str_replace("../", "", $headerPath);
            $stmt_s = "UPDATE `scholarship` SET `cover_img`='$header_clean' WHERE u_id = $d_id ";
            $result_s = mq($stmt_s);
            if ($result_s == TRUE) {
                $status = 1;
            }
        } else {
            // Display error message if header image upload fails
            $status = 0;
            echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error uploading header image.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }

    if (isset($_FILES["photo1"]) && $_FILES["photo1"]["error"] == 0) {
        $photo1 = uploadPhotoScholar($_FILES["photo1"]);
        if ($photo1 !== false) {
            // Header image is set, update database with header image
            $photo1_clean = str_replace("../", "", $photo1);
            $stmt_q = "UPDATE `scholarship` SET `img1`='$photo1_clean' WHERE u_id = $d_id ";
            $result_q = mq($stmt_q);
            if ($result_q == TRUE) {
                $status = 1;
            }
        } else {
            // Display error message if header image upload fails
            $status = 0;
            echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error uploading header image.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }

    if (isset($_FILES["photo2"]) && $_FILES["photo2"]["error"] == 0) {
        $photo2 = uploadPhotoScholar($_FILES["photo2"]);
        if ($photo2 !== false) {
            // Header image is set, update database with header image
            $photo2_clean = str_replace("../", "", $photo2);
            $stmt_r = "UPDATE `scholarship` SET `img2`='$photo2_clean' WHERE u_id = $d_id ";
            $result_r = mq($stmt_r);
            if ($result_r == TRUE) {
                $status = 1;
            }
        } else {
            // Display error message if header image upload fails
            $status = 0;
            echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error uploading header image.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }

    $stmt_x = "UPDATE `register` SET `name`='$name_r', `email`='$email_r', `num`='$phone_r' WHERE id = $d_id ";
    $stmt_y = "UPDATE `scholarship` SET `org_name`= '$oname_r',`scholar_name`='$sname_r',`bio`='$bio_r',`location`='$loc_r',`field`='$field_r',`level`='$level_r', cat = '$cat_r',`criteria`='$criteria',`high`='$high',`award`='$award',`doc`='$doc' WHERE u_id = $d_id";
    $result = mq($stmt_x);
    $result_s = mq($stmt_y);
    if ($result == TRUE && $result_s == TRUE) {
        $status = 1;
    } else {
        // Display error message if database update fails
        $status = 0;
        die('Query execution failed: ' . mysqli_error($conn));
        // echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error updating data.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }


    if ($status == 1) {
        echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Data saved successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

$stmt = "SELECT * FROM scholarship INNER JOIN register ON scholarship.u_id = register.id WHERE u_id = '$d_id'";
$result = mq($stmt);
while ($row = mfa($result)) {
    $name_r = $row['name'];
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
    $doc = $row['doc'];
    $cat = $row['cat'];
    $num = explode(',', $doc);
    $num_l = explode(',', $level);
    $num_c = explode(',', $cat);
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
                        <img class="rounded-circle me-3" src="<?= $file_url ?><?= $profileImg ?>" alt="" style="width: 40px; height: 40px;">
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
                <label class="form-label col-sm-2">Person Name:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter your name" name="name" value="<?= $name_r ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Organization Name:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter organization name" name="o_name" value="<?= $org_name ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Scholarship Name:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter scholarship name" name="s_name" value="<?= $scholar_name ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Bio:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter bio" name="bio" value="<?= $bio ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Location:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter your location" name="loc" value="<?= $location ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Phone:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter your number" name="phone" value="<?= $phone ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter your email" name="email" value="<?= $email ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Field Study Applicable:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Add field" type='text' name='field' value="<?= $field ?>" />
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Course Level Applicable:</label>
                <div class="col-sm-10">

                    <select id="multipleSelect" multiple name="level" placeholder="Select level" data-search="true" data-silent-initial-value-set="true">
                        <?php
                        $stmt_l = "SELECT * FROM `level`";
                        $result_l = mq($stmt_l);
                        if (mnr($result_l) > 0) {
                            while ($row = mfa($result_l)) {
                                $name = $row['level'];
                                $id = $row['id'];
                        ?>
                                <option value=<?= $id ?> <?= (in_array($id, $num_l)) ? "selected" : "" ?>><?= $name ?></option>

                        <?php }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Scholarship Categories:</label>
                <div class="col-sm-10">

                    <select id="multipleSelect" multiple name="cat" placeholder="Select categories" data-search="true" data-silent-initial-value-set="true">
                        <?php
                        $stmt_c = "SELECT * FROM `cat`";
                        $result_c = mq($stmt_c);
                        if (mnr($result_c) > 0) {
                            while ($row = mfa($result_c)) {
                                $name = $row['cat'];
                                $id = $row['id'];
                        ?>
                                <option value=<?= $id ?> <?= (in_array($id, $num_c)) ? "selected" : "" ?>><?= $name ?></option>

                        <?php }
                        }
                        ?>
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
                    <textarea class="editor" name="criteria" placeholder="Enter your text here..."><?= $criteria ?></textarea>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Photo 1:</label>
                <div class="col-sm-10">
                    <div id="drag-drop-area" class="mb-3">
                        <p>Drag & drop your file here or <label for="file-input" class="text-primary">browse</label>.</p>
                        <input type="file" name="photo1" id="file-input" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Highlights:</label>
                <div class="col-sm-10">
                    <textarea class="editor" name="high" placeholder="Enter your text here..."><?= $high ?></textarea>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Awards:</label>
                <div class="col-sm-10">
                    <textarea class="editor" name="award" placeholder="Enter your text here..."><?= $award ?></textarea>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Photo 2:</label>
                <div class="col-sm-10">
                    <div id="drag-drop-area" class="mb-3">
                        <p>Drag & drop your file here or <label for="file-input" class="text-primary">browse</label>.</p>
                        <input type="file" name="photo2" id="file-input" accept="image/*">
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
                    <select id="multipleSelect" multiple name="native-select" placeholder="Native Select" data-search="true" data-silent-initial-value-set="true" value="<?= $doc ?>">
                        <?php
                        $stmt_d = "SELECT * FROM `file` WHERE u_id = $d_id";
                        $result_d = mq($stmt_d);
                        if (mnr($result_d) > 0) {
                            while ($row = mfa($result_d)) {
                                $name = $row['name'];
                                $id = $row['id'];
                        ?>
                                <option value=<?= $id ?> <?= (in_array($id, $num)) ? "selected" : "" ?>><?= $name ?></option>

                        <?php }
                        }
                        ?>
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
            <a class="btn btn-sm btn-outline-dark w-auto" href="<?= $current_url ?>scholar.php/<?= $id ?>">Cancel</a>
            <button class="btn btn-sm btn-primary w-auto" type="submit" name="submit">Save changes</button>
        </div>
    </form>
</div>
<!-- Widgets End -->
<script type="text/javascript" src="<?= $file_url ?>js/virtual-select.min.js"></script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: '#multipleSelect'
    });
</script>
<script>

</script>

<?php include_once("footer.php") ?>