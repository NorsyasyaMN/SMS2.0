<?php include_once("header.php");
if (isset($_GET["s_id"])) {
    $s_id = $_GET["s_id"];
}
$stmt = "SELECT * FROM applicant INNER JOIN register ON applicant.u_id = register.id WHERE u_id = '$d_id'";
$result = mq($stmt);
if ($result) {
    if (mnr($result) > 0) {
        while ($row = mfa($result)) {
            $email = $row["email"];
            $num = $row["num"];
            $u_name = $row["name"];
            $loc = $row["location"];
        }
    }
} else {
    die('Query execution failed: ' . mysqli_error($conn));
}

?>
<div class="container-fluid pt-4 px-4">
    <h2>Application Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form action="<?= $current_url ?>scholarship-details.php?s_id=<?= $s_id ?>" method="post">
        <div class="bg-light rounded p-4">
            <h5>Applicant Information</h5>
            <p>Update some personal information. The data will never be publicly available.</p>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Fullname:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="name" placeholder="Fullname" name="name" value="<?= $u_name ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" placeholder="Email" name="email" value="<?= $email ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Phone:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Phone" name="phone" value="<?= $num ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Location:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Location" name="loc" value="<?= $loc ?>">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Gender:</label>
                <div class="col-sm-10">
                    <select class="form-select" name="gen" aria-label="Select Gender">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">IC Number:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Identity Card Number" name="ic">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Occupation:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Occupation" name="occ">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Document to Upload:</label>
                <div class="col-sm-10">
                    <select id="multipleSelect" multiple name="doc" placeholder="Select Document" data-search="true" data-silent-initial-value-set="true">
                        <?php
                        $stmt = "SELECT * FROM `file` WHERE u_id = '$d_id'";
                        $result = mq($stmt);
                        if ($result) {
                            while ($row = mfa($result)) {
                                $doc_id = $row['id'];
                                $name = $row['name'];
                        ?>
                                <option value="<?= $doc_id ?>"><?= $name ?></option>
                        <?php
                            }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a class="btn btn-sm btn-outline-dark w-auto" href="<?= $current_url ?>scholarship-details.php?s_id=<?= $s_id ?>">Cancel</a>
                <button class="btn btn-sm btn-primary w-auto" type="submit" name="submit">Submit</button>
            </div>
        </div>
    </form>
</div>
<!-- Widgets End -->
<script type="text/javascript" src="<?= $current_url ?>js/virtual-select.min.js"></script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: '#multipleSelect'
    });
</script>
<?php include_once("footer.php") ?>