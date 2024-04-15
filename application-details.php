<?php include_once("header.php");
if (isset($_GET["s_id"])) {
    $id_number = $_GET["s_id"];
    $id_parts = explode('/', $id_number);

    // Extract the first part which contains the number
    $s_id = $id_parts[0];
}

$stmt = "SELECT * FROM `application` WHERE u_id = $d_id AND s_id = $s_id";
$result = mq($stmt);
if($result){
    if (mnr($result) > 0){
        while ($row = mfa($result)){
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
    <h2>Application Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form class="bg-light rounded p-4">
        <div class="d-flex justify-content-between">
            <div>
                <h5>Applicant Information</h5>
                <p>Update some personal information. The data will never be publicly available.</p>
            </div>
            <div>
                <?php $btn = btnStatus($status);?>
                <button type="button" class="btn <?=$btn?> ms-2"><?=$status?></button>
            </div>
        </div>
        <hr>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Fullname:</label>
            <div class="col-sm-10">
                <input class="form-control" value="<?=$name?>" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Email:</label>
            <div class="col-sm-10">
                <input class="form-control" value="<?=$email?>" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Phone:</label>
            <div class="col-sm-10">
                <input class="form-control" value="<?=$phone?>" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Location:</label>
            <div class="col-sm-10">
                <input class="form-control" value="<?=$loc?>" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Gender:</label>
            <div class="col-sm-10">
                <input class="form-control" value="<?=$gen?>" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">IC Number:</label>
            <div class="col-sm-10">
                <input class="form-control" value="<?=$ic?>" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Occupation:</label>
            <div class="col-sm-10">
                <input class="form-control" value="<?=$occ?>" disabled>
            </div>
        </div>
        <?php
        $stmt_d = "SELECT * FROM `file` WHERE id IN ($doc)";
        $result_d = mq($stmt_d);
        if ($result_d) {
            if (mnr($result_d) > 0) {
                while ($row = mfa($result_d)) {
                    $name_d = $row['name'];
                    $file = $current_url . $row['doc'];
        ?>
                    <div class="pb-3 row">
                        <label class="form-label col-sm-2"><?= $name_d ?>:</label>
                        <div class="col-sm-10">
                            <div class="d-flex text-center">
                                <a class="btn btn-sm btn-primary w-auto me-2" href="<?= $file ?>" target="_blank">View</a>
                                <a class="btn btn-sm btn-primary w-auto" href="<?= $file ?>" download="filename.pdf">Download</a>
                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        }
        ?>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Remark:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Remark" value="<?=$remark?>" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Interview Link:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Interview link" value="<?=$iv_link?>" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Interview Date:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Interview Date" value="<?=$iv_date?>" disabled>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-sm btn-outline-dark w-auto" href="<?= $current_url ?>application.php/<?=$id?>">Back</a>
        </div>
    </form>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>