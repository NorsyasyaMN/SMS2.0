<?php
include_once("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['submit_level'])) {

        $level_a = $_POST['level'];
        $stmt_l = "SELECT * FROM `level` WHERE `level` like LOWER('%$level_a%') ";
        $result_l = mq($stmt_l);
        if ($result_l) {
            if (mnr($result_l) > 0) {
                echo '<div class="alert alert-warning alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Level already exist.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
                $stmt_l_a = "INSERT INTO `level` (`level`) VALUES ('$level_a')";
                $result_l_a = mq($stmt_l_a);
                if ($result_l_a) {
                    echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Level data saved successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
                else{
                    echo '<div class="alert alert-warning alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Failed to save data.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
            }
        }
    }

    if (isset($_POST['submit_cat'])) {

        $cat_a = $_POST['cat'];
        $stmt_c = "SELECT * FROM `cat` WHERE `cat` like LOWER('%$cat_a%') ";
        $result_c = mq($stmt_c);
        if ($result_c) {
            if (mnr($result_c) > 0) {
                echo '<div class="alert alert-warning alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Category already exist.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
                $stmt_c_a = "INSERT INTO `cat` (`cat`) VALUES ('$cat_a')";
                $result_c_a = mq($stmt_c_a);
                if ($result_c_a) {
                    echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Category data saved successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
                else{
                    echo '<div class="alert alert-warning alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Failed to save data.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
            }
        }
    }

    if (isset($_POST['submit_field'])) {

        $field_a = $_POST['field'];
        $stmt_f = "SELECT * FROM `field` WHERE `field` like LOWER('%$field_a%') ";
        $result_f = mq($stmt_f);
        if ($result_f) {
            if (mnr($result_f) > 0) {
                echo '<div class="alert alert-warning alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Field already exist.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
                $stmt_f_a = "INSERT INTO `field` (`field`) VALUES ('$field_a')";
                $result_f_a = mq($stmt_f_a);
                if ($result_f_a) {
                    echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Field data saved successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
                else{
                    echo '<div class="alert alert-warning alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Failed to save data.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
            }
        }
    }
}
?>
<div class="container-fluid pt-4 px-4">
    <h2>Setting Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <form method="post" action="<?= $current_url ?>setting.php/<?= $id ?>">
            <h5>Add new level</h5>
            <p>Add new level of studies</p>
            <hr>
            <div class=" pb-3 row">
                <label for="level" class="form-label col-sm-2">Level:</label>
                <div class="col-sm-8">
                    <input type="name" class="form-control" name="level">
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-sm btn-primary w-auto" type="submit" name="submit_level"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <form method="post" action="<?= $current_url ?>setting.php/<?= $id ?>">
            <h5>Add new categories</h5>
            <p>Add new categories of scholarship</p>
            <hr>
            <div class=" pb-3 row">
                <label for="cat" class="form-label col-sm-2">Categories:</label>
                <div class="col-sm-8">
                    <input type="name" class="form-control" name="cat">
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-sm btn-primary w-auto" type="submit" name="submit_cat"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <form method="post" action="<?= $current_url ?>setting.php/<?= $id ?>">
            <h5>Add new field studies</h5>
            <p>Add new field of studies</p>
            <hr>
            <div class=" pb-3 row">
                <label for="field" class="form-label col-sm-2">Field of studies:</label>
                <div class="col-sm-8">
                    <input type="name" class="form-control" name="field">
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-sm btn-primary w-auto" type="submit" name="submit_field"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Widgets End -->
<?php
include_once("footer.php")
?>