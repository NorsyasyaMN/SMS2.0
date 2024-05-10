<?php
include_once("header.php");
// if (isset($_GET["p_id"]) && isset($_GET["u_id"])) {
//     $u_id = $_GET["u_id"];
//     $pid_number = $_GET["p_id"];
//     $id_parts = explode('/', $pid_number);

//     // $array_as_string = implode(', ', $id_parts);

//     // echo $array_as_string;
//     // Extract the first part which contains the number
//     $p_id = $id_parts[0];
// }

if (isset($_GET["s_id"])) {
    $id_number = $_GET["s_id"];
    $id_parts = explode('/', $id_number);

    // Extract the first part which contains the number
    $s_id = $id_parts[0];
    
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["highlight"])) {

        $date_h = date("Y-m-d");
        $stmt_check = "SELECT * FROM highlight WHERE s_id = $s_id AND u_id = $d_id";
        $result_check = mq($stmt_check);
        if ($result_check) {
            if (mnr($result_check) > 0) {
                $stmt_d = "DELETE FROM `highlight` WHERE s_id = $s_id AND u_id = $d_id";
                $result_d = mq($stmt_d);
            } else {
                $stmt_h = "INSERT INTO `highlight` (`s_id`,`u_id`,`date`) VALUES ('$s_id','$d_id','$date_h')";
                $result_h = mq($stmt_h);
                if ($result_h) {
                    echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Succesfully highlighted.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else {
                    echo '<div class="alert alert-warning alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Error to highlight the scholarship.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
            }
        }
    }

    if (isset($_POST["submit"])) {
        $a_name = $_POST["name"];
        $a_email = $_POST["email"];
        $a_phone = $_POST["phone"];
        $a_loc = $_POST["loc"];
        $a_gen = $_POST["gen"];
        $a_ic = $_POST["ic"];
        $a_occ = $_POST["occ"];
        $a_doc = $_POST["doc"];
        $a_date = date("Y-m-d");

        $stmt_x = "SELECT * FROM scholarship WHERE id = $s_id";
        $result_x = mq($stmt_x);
        if ($result_x) {
            if (mnr($result_x) > 0) {
                while ($row = mfa($result_x)) {
                    $u_id = $row["u_id"];
                }
            }
        }

        $stmt_i = "INSERT INTO `application`(`u_id`, `s_id`, `name`, `email`, `phone`, `loc`, `gen`, `ic`, `occ`, `doc`, `date`, `status`, `remark`, `iv_time`, `iv_link`, `iv_date`) VALUES ('$d_id','$u_id','$a_name','$a_email','$a_phone','$a_loc','$a_gen','$a_ic','$a_occ','$a_doc', '$a_date', 'Pending', '', '', '', '')";
        $result_a = mq($stmt_i);
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Succesfully applied.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Error to applied the scholarship.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
}

$stmt = "SELECT * FROM scholarship INNER JOIN register ON scholarship.u_id = register.id WHERE scholarship.id = '$s_id'";
$result = mq($stmt);
if ($result) {
    while ($row = mfa($result)) {
        $email = $row['email'];
        $phone = $row['num'];
        $profileImg = $row['img'];
        $headerImg = $row['cover_img'];
        $name = $row['org_name'];
        $scholar_name = $row['scholar_name'];
        $bio = $row['bio'];
        $location = $row['location'];
        $field = $row['field'];
        $level = $row['level'];
        $criteria = $row['criteria'];
        $img1 = $row['img1'];
        $high = $row['high'];
        $awards = $row['award'];
        $img2 = $row['img2'];
        $doc = $row['doc'];
        $cat = $row['cat'];
    }
} else {
    die('Query execution failed: ' . mysqli_error($conn));
}

$star = "";
$stmt_s = "SELECT * FROM highlight WHERE s_id = $s_id AND u_id = $d_id";
$result_s = mq($stmt_s);
if ($result_s) {
    if (mnr($result_s) > 0) {
        $star = "star";
    }
}
?>

<style>
    ol,
    ul {
        padding-left: 20px;
        list-style-type: disc;
    }
</style>
<div id="alert-container"></div>
<div class="container-fluid pt-4 px-4">
    <h2>Scholarship Details</Details>
    </h2>
</div>
<!-- Profile Start-->
<div class="container-fluid pt-3 px-4">
    <div>
        <div class="upper">
            <img src="<?= $file_url ?><?= $headerImg ?>" class="img-fluid">
        </div>
        <div class="user">
            <div class="profile">
                <img src="<?= $file_url ?><?= $profileImg ?>" class="rounded-circle" width="80">
            </div>
        </div>
    </div>
    <div class="bg-light pt-5 d-flex justify-content-between px-3">
        <div>
            <h4 class="mb-0"><?= $scholar_name ?></h4>
            <span class="text-muted d-block mb-2"><?= $email ?></span>
        </div>
        <div class="d-flex">
            <form id="starForm" method="post" action="">
                <input type="hidden" name="highlight" value="<?= $s_id ?>">
                <button id="starBtn"><i class="bi bi-star-fill bookmark <?= ($star === "star") ? "color-blue" : '' ?>" width="16" height="16"></i></button>
            </form>
            <a class="ps-2" href="<?= $current_url ?>scholarship-application.php?s_id=<?= $s_id ?>/<?= $id ?>" onclick="return checkRequirement('<?= $s_id ?>', '<?= $id ?>', '<?= $d_id ?>' )"><button class="btn btn-primary btn-sm follow w-auto">Apply Scholarship</button></a>
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
                        <p><?= $bio ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Field</h5>
                        <?php
                        if ($field == '') {
                            echo "<p>none</p>";
                        } else {
                            $stmt_f = "SELECT * FROM `field` WHERE id IN ($field)";
                            $result_f = mq($stmt_f);
                            $name_field  = array();
                            if ($result_f) {
                                while ($row = mfa($result_f)) {
                                    $name_field[] = $row['field'];
                                }
                                $combinedField = implode(", ", $name_field);
                                echo "<p>$combinedField</p>";
                            }
                        }
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Level</h5>
                        <?php
                        $stmt_l = "SELECT * FROM `level` WHERE id IN ($level)";
                        $result_l = mq($stmt_l);
                        $name_level  = array();
                        if ($result_l) {
                            while ($row = mfa($result_l)) {
                                $name_level[] = $row['level'];
                            }
                            $combinedLevel = implode(", ", $name_level);
                            echo "<p>$combinedLevel</p>";
                        }
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Categories</h5>
                        <?php
                        $stmt_c = "SELECT * FROM `cat` WHERE id IN ($cat)";
                        $result_c = mq($stmt_c);
                        $name_cat  = array();
                        if ($result_c) {
                            while ($row = mfa($result_c)) {
                                $name_cat[] = $row['cat'];
                            }
                            $combinedCat = implode(", ", $name_cat);
                            echo "<p>$combinedCat</p>";
                        }
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Phone</h5>
                        <p><?= $phone ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Email</h5>
                        <p><?= $email ?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6 py-2">
                        <h5>Location</h5>
                        <p><?= $location ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-sm-12 col-md-6 col-xl-6">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-2 border-bottom py-2">
                    <h5 class="mb-0">Interview</h5>
                    <a href="">Show All</a>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="<?= $current_url ?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="<?= $current_url ?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="<?= $current_url ?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center pt-3">
                    <img class="rounded-circle flex-shrink-0" src="<?= $current_url ?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="h-100 bg-light rounded p-4">
                <div class="border-bottom py-2 mb-4">
                    <h5 class="mb-0">Highlights and Criteria</h5>
                    <!-- <a href="">Show All</a> -->
                </div>
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <h5>Criteria</h5>
                        <ul class="ps-3">
                            <p><?= $criteria ?></p>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <img class="img-fluid" src="<?= $file_url ?>/<?= $img1 ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <img class="img-fluid" src="<?= $file_url ?>/<?= $img2 ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="pb-3">
                            <h5>Highlights</h5>
                            <p><?= $high ?></p>
                        </div>
                        <div class="pb-3">
                            <h5>Awards</h5>
                            <p><?= $awards ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th width="30" scope="col">No</th>
                            <th scope="col">Document</th>
                            <th width="30" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($doc == '') {
                            echo "<tr><td class='text-center' colspan='5'><p>No document uploaded</p></td></tr>";
                        } else {
                            $count = 1;
                            $stmt = "SELECT * FROM `file` WHERE id IN ($doc)";
                            $result = mq($stmt);
                            if ($result) {
                                while ($row = mfa($result)) {
                                    $doc_id = $row['id'];
                                    $name = $row['name'];
                                    $file = $current_url . $row['doc']; ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $name ?></td>
                                        <td><a class="btn btn-sm btn-primary" href="<?= $file ?>" target="_blank">View</a></td>
                                    </tr>
                        <?php
                                    $count++;
                                }
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('starBtn').addEventListener('click', function() {
        document.getElementById('starForm').submit();
    });
</script>
<script>
    function checkRequirement(id_x, id_y, id_z) {
        // Send an asynchronous request to the server to check the requirement
        var xhr = new XMLHttpRequest();
        var url = "check_requirement.php?id_x=" + id_x + "&id_y=" + id_z;
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Response received from server
                if (xhr.responseText === "satisfied") {
                    // Requirement satisfied, proceed with link action
                    window.location.href = "http://localhost/SMS2.0/applicant/scholarship-application.php?s_id=" + id_x + "/" + id_y;
                } else {
                    // Requirement not satisfied, display Bootstrap alert message
                    var alertContainer = document.getElementById("alert-container"); // Define alertContainer
                    var alertDiv = document.createElement("div");
                    alertDiv.classList.add("alert", "alert-warning", "alert-dismissible", "fade", "show", "col-sm-4", "m-4", "float-end");
                    alertDiv.setAttribute("role", "alert");
                    alertDiv.innerHTML = `
                        Sorry, requirement is not satisfied 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    `;
                    
                    alertContainer.appendChild(alertDiv);
                }
            }
        };
        xhr.send();

        // Prevent the default link action
        return false;
    }
</script>
<!-- Widgets End -->
<?php include_once("footer.php") ?>