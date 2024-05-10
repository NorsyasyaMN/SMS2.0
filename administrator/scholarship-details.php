<?php include_once("header.php");

if (isset($_GET["id"])) {
    $u_id = $_GET["id"];
}

if (($_SERVER["REQUEST_METHOD"] == "POST")) {

    $verify = $_POST["verify"];

    $stmt_u = "UPDATE `scholarship` SET `verify`= '$verify' WHERE u_id = '$u_id'";
    $result_u = mq($stmt_u);
    if ($result_u) {
        echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Data saved successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } else {
        echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error updating data.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

$stmt = "SELECT * FROM `scholarship` INNER JOIN `register` ON scholarship.u_id = register.id WHERE u_id = '$u_id'";
$result = mq($stmt);
while ($row = mfa($result)) {
    $name_r = $row['name'];
    $email = $row['email'];
    $phone = $row['num'];
    $license  = $row['license'];
    $org_name = $row['org_name'];
    $scholar_name = $row['scholar_name'];
    $location = $row['location'];
    $verify = $row['verify'];
}
?>

<div class="container-fluid pt-4 px-4">
    <h2>Applicant Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form method="POST" action="">
        <div class="bg-light rounded p-4">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Applicant Information</h5>
                    <p>Update some personal information. The data will never be publicly available.</p>
                </div>
                <div>
                    <?php $btn = btnStatus($verify) ?>
                    <button type="button" class="btn <?=$btn?> ms-2"><?=$verify?></button>
                </div>
            </div>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Fullname:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $name_r ?>" disabled>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Organization Email:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $email ?>" disabled>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Phone:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $phone ?>" disabled>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Location:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $location ?>" disabled>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Scholarship:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $scholar_name ?>" disabled>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Organization:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $org_name ?>" disabled>
                </div>
            </div>
            <?php
            $stmt_d = "SELECT * FROM `file` WHERE id IN ($license)";
            $result_d = mq($stmt_d);
            if ($result_d) {
                if (mnr($result_d) > 0) {
                    while ($row = mfa($result_d)) {
                        $name_d = $row['name'];
                        $file = $file_url . $row['doc'];
            ?>
                        <div class="pb-3 row">
                            <label class="form-label col-sm-2">Business License:</label>
                            <div class="col-sm-10">
                                <div class="d-flex text-center">
                                    <a class="btn btn-sm btn-primary w-auto me-2" href="<?= $file ?>" target="_blank">View</a>
                                    <a class="btn btn-sm btn-primary w-auto" href="<?= $file ?>" download="<?= $name_d ?>.pdf">Download</a>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            } else { ?>

                <div class="pb-3 row">
                    <label class="form-label col-sm-2">Business License:</label>
                    <div class="col-sm-10">
                        <div class="d-flex text-center">
                            <p>None</p>
                        </div>
                    </div>
                </div>

            <?php }
            ?>
            <div class="pb-3 row">
                <label for="role" class="form-label col-sm-2">Verify:</label>
                <div class="col-sm-10">
                    <select class="form-select form-control bg-white" name="verify">
                        <option value="" disabled <?= ($verify == '') ? "selected" : "" ?>>Status</option>
                        <option value="Approved" <?= ($verify == 'Approved') ? "selected" : "" ?>>Approved</option>
                        <option value="Pending" <?= ($verify == 'Pending') ? "selected" : "" ?>>Pending</option>
                        <option value="Rejected" <?= ($verify == 'Rejected') ? "selected" : "" ?>>Rejected</option>
                    </select>
                </div>
            </div>
            <!-- <div class="pb-3 row">
                <legend class="col-form-label col-sm-2 pt-0">Disable Content</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="disable" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                            Disable
                        </label>
                    </div>
                </div>
            </div> -->
            <div class="d-flex justify-content-between">
                <a class="btn btn-sm btn-outline-dark w-auto" href="index.php">Cancel</a>
                <button class="btn btn-sm btn-primary w-auto" type="submit" name="submit">Save changes</button>
            </div>
        </div>
    </form>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>