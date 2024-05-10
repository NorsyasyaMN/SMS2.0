<?php
include_once("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name_r = $_POST["fullname"];
    $email_r = $_POST["email"];
    $bio_r = $_POST["bio"];
    $stud_r = $_POST["stud"];
    $phone_r = $_POST["phone"];
    $loc_r = $_POST["loc"];
    $level_r = $_POST["level"];
    $letter = $_POST["letter"];
    $status = 0;

    // Check if profile image is set
    if (isset($_FILES["profileImage"]) && $_FILES["profileImage"]["error"] == 0) {
        $profilePath = uploadPhoto($_FILES["profileImage"]);
        if ($profilePath !== false) {
            // Profile image is set, update database with profile image
            $stmt_c = "UPDATE `applicant` SET `img`='$profilePath' WHERE u_id = $d_id ";
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
        $headerPath = uploadPhoto($_FILES["headerImage"]);
        if ($headerPath !== false) {
            // Header image is set, update database with header image
            $stmt_s = "UPDATE `applicant` SET `cover_img`='$headerPath' WHERE u_id = $d_id ";
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

    $stmt_x = "UPDATE `register` SET `name`='$name_r', `email`='$email_r', `num`='$phone_r' WHERE id = $d_id ";
    $stmt_y = "UPDATE `applicant` SET `bio`='$bio_r', `stud`='$stud_r', `level`='$level_r',`location`='$loc_r', `letter`='$letter' WHERE u_id = $d_id";
    $result = mq($stmt_x);
    $result_s = mq($stmt_y);
    if ($result == TRUE && $result_s == TRUE) {
        $status = 1;
    } else {
        // Display error message if database update fails
        $status = 0;
        echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error updating data.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }

    if ($status == 1) {
        echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Data saved successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

$stmt = "SELECT * FROM applicant INNER JOIN register ON applicant.u_id = register.id WHERE u_id = '$d_id'";
$result = mq($stmt);
while ($row = mfa($result)) {
    $profileImg = $row['img'];
    $headerImg = $row['cover_img'];
    $name = $row['name'];
    $email = $row['email'];
    $bio = $row['bio'];
    $stud = $row['stud'];
    $phone = $row['num'];
    $location = $row['location'];
    $letter = $row['letter'];
    $level = $row['level'];
    $verify = $row['verify'];
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
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Applicant Information</h5>
                    <p>Update some personal information. The data will never be publicly available.</p>
                </div>
                <div>
                    <?php $btn = btnStatus($verify) ?>
                    <button type="button" class="btn <?= $btn ?> ms-2"><?= $verify ?></button>
                </div>
            </div>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Profile Photo:</label>
                <div class="col-sm-10">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle me-3" src="<?= $current_url ?>/<?= ($profileImg == '') ? 'uploads/user.jpg' : $profileImg; ?>" alt="" style="width: 40px; height: 40px;">
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
                <label class="form-label col-sm-2">Fullname:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter Fullname" name="fullname" value="<?= $name ?>" required>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter Email" name="email" type="email" value="<?= $email ?>" required>
                </div>
            </div>
            <div class="pb-3 row">
                <label for="editor" class="form-label col-sm-2">Bio:</label>
                <div class="col-sm-10">
                    <textarea id="editor" placeholder="Enter bio here" name="bio" required><?= ($bio == '') ? 'none' : $bio ?></textarea>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Field of Studies:</label>
                <div class="col-sm-10">
                    <select name="stud" class="form-select form-control bg-white">
                        <option value="0" disabled <?= ($stud == '') ? "selected" : "" ?>>Select field of studies</option>
                        <?php
                        $stmt_f = "SELECT * FROM `field`";
                        $result_f = mq($stmt_f);
                        if (mnr($result_f) > 0) {
                            while ($row = mfa($result_f)) {
                                $name = $row['field'];
                                $f_id = $row['id'];
                        ?>
                                <option value=<?= $f_id ?> <?= ($f_id == $stud) ? "selected" : "" ?>><?= $name ?></option>
                        <?php }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Level of Studies:</label>
                <div class="col-sm-10">
                    <select name="level" class="form-select form-control bg-white">
                        <option value="0" disabled <?= ($level == '') ? "selected" : "" ?>>Select level of studies</option>
                        <?php
                        $stmt_l = "SELECT * FROM `level`";
                        $result_l = mq($stmt_l);
                        if (mnr($result_l) > 0) {
                            while ($row = mfa($result_l)) {
                                $name = $row['level'];
                                $l_id = $row['id'];
                        ?>
                                <option value=<?= $l_id ?> <?= ($l_id == $level) ? "selected" : "" ?>><?= $name ?></option>
                        <?php }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Confirmation Letter:</label>
                <div class="col-sm-10">
                    <select class="form-select form-control bg-white" name="letter">
                        <option value="" disabled <?= ($letter == '') ? "selected" : "" ?>>Select document</option>
                        <?php
                        $stmt = "SELECT * FROM `file` WHERE u_id = '$d_id'";
                        $result = mq($stmt);
                        if ($result) {
                            while ($row = mfa($result)) {
                                $doc_id = $row['id'];
                                $name = $row['name'];
                        ?>
                                <option value="<?= $doc_id ?>" <?= ($doc_id == $letter) ? "selected" : "" ?>><?= $name ?></option>
                        <?php
                            }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Phone:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter Phone" name="phone" value="<?= $phone ?>" required>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Location:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter location" name="loc" value="<?= $location ?>" required>
                </div>
            </div>
            <div class="d-flex justify-content-between ">
                <a class="btn btn-sm btn-outline-dark w-auto" href="<?= $current_url ?>index.php/<?= $id ?>">Cancel</a>
                <button class="btn btn-sm btn-primary w-auto" type="submit" name="submit">Save changes</button>
            </div>
        </div>
    </form>
</div>
<!-- Widgets End -->

<?php include_once("footer.php") ?>