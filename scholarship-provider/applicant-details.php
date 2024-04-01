<?php include_once("header.php");
if (isset($_GET["u_id"])) {
    $id_number = $_GET["u_id"];
    $id_parts = explode('/', $id_number);

    // Extract the first part which contains the number
    $u_id = $id_parts[0];

}
$stmt = "SELECT * FROM `application` WHERE id = $u_id";
$result = mq($stmt);
if($result){
    if(mnr($result) > 0){
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
        }
    }
}
?>
<div class="container-fluid pt-4 px-4">
    <h2>Applicant Details</h2>
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
                <button type="button" class="btn btn-success ms-2"><?=$status?></button>
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
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Parents Identity Card:</label>
            <div class="col-sm-10">
                <div class="d-flex text-center">
                    <a class="btn btn-sm btn-primary w-auto me-2" href="#">View</a>
                    <a class="btn btn-sm btn-primary w-auto" href="#">Download</a>
                </div>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Payslip:</label>
            <div class="col-sm-10">
                <div class="d-flex text-center">
                    <a class="btn btn-sm btn-primary w-auto me-2" href="#">View</a>
                    <a class="btn btn-sm btn-primary w-auto" href="#">Download</a>
                </div>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Student Letter:</label>
            <div class="col-sm-10">
                <div class="d-flex text-center">
                    <a class="btn btn-sm btn-primary w-auto me-2" href="#">View</a>
                    <a class="btn btn-sm btn-primary w-auto" href="#">Download</a>
                </div>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Register Document:</label>
            <div class="col-sm-10">
                <div class="d-flex text-center">
                    <a class="btn btn-sm btn-primary w-auto me-2" href="#">View</a>
                    <a class="btn btn-sm btn-primary w-auto" href="#">Download</a>
                </div>
            </div>
        </div>
        <div class="pb-3 row">
            <label for="role" class="form-label col-sm-2">Status:</label>
            <div class="col-sm-10">
                <select id="role" class="form-select form-control bg-white">
                    <option selected>Status</option>
                    <option value="Approved">Approved</option>
                    <option value="Shorlisted">Shortlisted</option>
                    <option value="Pending">Pending</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Remark:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Remark" name="remark">
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Interview Link:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Interview link" name="int">
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Interview Time:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Interview time" name="int_time">
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Interview Date:</label>
            <div class="col-sm-10">
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control" id="date" />
                    <span class="input-group-append">
                        <span class="input-group-text bg-light d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-sm btn-outline-dark w-auto" href="applicant.php">Cancel</a>
            <a class="btn btn-sm btn-primary w-auto" href="applicant.php">Save changes</a>
        </div>
    </form>
</div>
<!-- Widgets End -->
<script>
    // Ensure DOM is fully loaded before executing script
    $(document).ready(function() {
        // Initialize datepicker
        $('#datepicker').datepicker();
    });
</script>
<?php include_once("footer.php") ?>