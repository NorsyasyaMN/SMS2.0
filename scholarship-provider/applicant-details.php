<?php
include_once("header.php");

if (isset($_GET["p_id"]) && isset($_GET["u_id"])) {
    $u_id = $_GET["u_id"];
    $pid_number = $_GET["p_id"];
    $id_parts = explode('/', $pid_number);

    // $array_as_string = implode(', ', $id_parts);

    // echo $array_as_string;
    // Extract the first part which contains the number
    $p_id = $id_parts[0];
}

if (isset($_GET["u_id"])) {
    $id_number = $_GET["u_id"];
    $id_parts = explode('/', $id_number);

    $u_id = $id_parts[0];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["submit"])) {

        $status = $_POST["status"];
        $remark = $_POST["remark"];
        $int_link = $_POST["int_link"];
        $int_date = $_POST["int_date"];
        $int_time = $_POST["int_time"];

        $stmt_u = "UPDATE `application` SET `status`='$status', `remark`='$remark', `iv_link`='$int_link', `iv_date`='$int_date', 
        `iv_time`='$int_time' WHERE id = $u_id AND s_id = $d_id";
        $result_u = mq($stmt_u);
        if ($result_u) {
            echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Data updated successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error updating data.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
}

$stmt = "SELECT * FROM `application` WHERE id = $u_id";
$result = mq($stmt);
if ($result) {
    if (mnr($result) > 0) {
        while ($row = mfa($result)) {
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $loc = $row['loc'];
            $gen = $row['gen'];
            $ic = $row['ic'];
            $occ = $row['occ'];
            $doc = $row['doc'];
            $status = $row['status'];
            $remark = $row['remark'];
            $iv_link = $row['iv_link'];
            $iv_date = $row['iv_date'];
            $iv_time = $row['iv_time'];
        }
    }
}
?>
<div class="container-fluid pt-4 px-4">
    <h2>Applicant Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form action="" method="post">
        <div class="bg-light rounded p-4">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Applicant Information</h5>
                    <p>Update some personal information. The data will never be publicly available.</p>
                </div>
                <div>
                    <?php $btn = btnStatus($status) ?>
                    <button type="button" class="btn <?= $btn ?> ms-2"><?= $status ?></button>
                </div>
            </div>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Fullname:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $name ?>" name="name" disabled>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $email ?>" name="email" disabled>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Phone:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $phone ?>" name="phone" disabled>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Location:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $loc ?>" name="" disabled>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Gender:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $gen ?>" disabled>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">IC Number:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $ic ?>" disabled>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Occupation:</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?= $occ ?>" disabled>
                </div>
            </div>
            <?php
            $stmt_d = "SELECT * FROM `file` WHERE id IN ($doc)";
            $result_d = mq($stmt_d);
            if ($result_d) {
                if (mnr($result_d) > 0) {
                    while ($row = mfa($result_d)) {
                        $name_d = $row['name'];
                        $file = $file_url . $row['doc'];
            ?>
                        <div class="pb-3 row">
                            <label class="form-label col-sm-2"><?= $name_d ?>:</label>
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
            }
            ?>
            <div class="pb-3 row">
                <label for="role" class="form-label col-sm-2">Status:</label>
                <div class="col-sm-10">
                    <select id="role" name="status" class="form-select form-control bg-white">
                        <option value="Approved" <?= ($status == 'Approved') ? "selected" : "" ?>>Approved</option>
                        <option value="Shortlisted" <?= ($status == 'Shortlisted') ? "selected" : "" ?>>Shortlisted</option>
                        <option value="Pending" <?= ($status == 'Pending') ? "selected" : "" ?>>Pending</option>
                        <option value="Rejected" <?= ($status == 'Rejected') ? "selected" : "" ?>>Rejected</option>
                    </select>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Remark:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Remark" name="remark" value="<?= $remark ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Interview Link:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Interview link" name="int_link" value="<?= $iv_link ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Interview Time:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Interview time" name="int_time" value="<?= $iv_time ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Interview Date:</label>
                <div class="col-sm-10">
                    <div class="input-group date">
                        <input type="date" class="form-control" id="datepicker" name="int_date" value="<?= $iv_date ?>">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between <?=$display_p?>">
                <a class="btn btn-sm btn-outline-dark w-auto" href="<?= $current_url ?>applicant.php/<?= $id ?>">Cancel</a>
                <button class="btn btn-sm btn-primary w-auto" type="submit" name="submit">Save changes</button>
            </div>
            <div class="d-flex justify-content-between <?=$display?> ">
                <a class="btn btn-sm btn-outline-dark w-auto" href="<?= $current_url ?>applicant.php?p_id=<?=$s_id?>/<?= $id ?>">Cancel</a>
                <button class="btn btn-sm btn-primary w-auto" type="submit" name="submit">Save changes</button>
            </div>
        </div>
    </form>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>