<?php
include_once("header.php");

// Initialize variables
$stmt_lf = "";
$stmt_cf = "";
$s_stmt = "";
$s_date = " WHERE `date` > CURDATE() AND `verify` = 'Approved'";

$cat_a = [];
$where_clause = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST["filter"])) {

        $level = isset($_POST["level"]) ? $_POST["level"] : null;
        $cat = isset($_POST["cat"]) ? $_POST["cat"] : null;


        $level_a = filter($level);
        $cat_a = filter($cat);
        if ($level !== null && !empty($level)) {
            $stmt_lf = "`level` LIKE $level_a";
        }
        if ($cat !== null && !empty($cat)) {
            $stmt_cf = "`cat` LIKE $cat_a";
        }
    }

    if (isset($_POST["search"])) {
        $search = $_POST['name'];
        $s_stmt = "LOWER(scholar_name) LIKE LOWER('%$search%')";
    }

    // Combine all statements
    $where_clauses = [];

    if (!empty($stmt_lf)) {
        $where_clauses[] = $stmt_lf;
    }

    if (!empty($stmt_cf)) {
        $where_clauses[] = $stmt_cf;
    }

    if (!empty($s_stmt)) {
        $where_clauses[] = $s_stmt;
    }

    // Construct the WHERE clause
    $where_clause = '';
    if (!empty($where_clauses)) {
        $where_clause = 'AND ' . implode(' AND ', $where_clauses);
    }
}
?>
<div class="container-fluid pt-4 px-4">
    <h2>Scholarships</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-3 px-4">
    <form action="" method="POST">
        <div class="d-flex mb-4">
            <input class="form-control bg-transparent" type="text" placeholder="Search" name="name">
            <button type="submit" name="search" class="btn btn-primary ms-2">Search</button>
    </form>
</div>
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-4 mb-4">
        <form action="" method="post">
            <div class="filter-section bg-light p-3" style="border-radius:5px">
                <h6>Filter by Category</h6>
                <div class="level mb-3">
                    <h7>Level</h7>
                    <!-- Category Level Checkboxes -->
                    <select id="multipleSelect" multiple name="level" placeholder="Select Level" data-search="true" data-silent-initial-value-set="true">
                        <?php
                        $stmt_l = "SELECT * FROM `level`";
                        $result_l = mq($stmt_l);
                        if (mnr($result_l) > 0) {
                            while ($row = mfa($result_l)) {
                                $level = $row['level'];
                                $l_id = $row['id'];
                        ?>
                                <option value=<?= $l_id ?>><?= $level ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <!-- Category Level Checkboxes -->
                <div class="category mb-3">
                    <h7>Categories</h7>
                    <select id="multipleSelect" multiple name="cat" placeholder="Select Categories" data-search="true" data-silent-initial-value-set="true">
                        <?php
                        $stmt_c = "SELECT * FROM `cat`";
                        $result_c = mq($stmt_c);
                        if (mnr($result_c) > 0) {
                            while ($row = mfa($result_c)) {
                                $name = $row['cat'];
                                $c_id = $row['id'];
                        ?>
                                <option value=<?= $c_id ?>><?= $name ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="filter" class="btn btn-primary mt-3 w-auto">Apply Filters</button>
            </div>
        </form>
    </div>

    <!-- Scholarship Card 1 -->
    <div class="col-xl-9 col-lg-9 col-md-8 pt-3 bg-light" style="border-radius:5px">
        <?php
        $stmt_s = "SELECT * FROM `scholarship` $s_date $where_clause";
        $result_s = mq($stmt_s);
        $currentDate = new DateTime();
        if ($result_s) {
            if (mnr($result_s) > 0) {
                while ($row = mfa($result_s)) {
                    $s_id = $row['id'];
                    $img = $row['img'];
                    $loc = $row['location'];
                    $sname = $row['scholar_name'];
                    $level = $row['level'];
                    $field = $row['field'];
                    $cat = $row['cat'];
                    $date = $row['date'];
                    // Calculate the difference between dates
                    $date2 = new DateTime($date);
                    $interval = $currentDate->diff($date2);

                    // Format the interval as desired
                    $dateDifference = $interval->format('%a days left'); ?>
                    <div class="single-scholar-items bg-dark-light mb-4">
                        <div class="scholar-items">
                            <div class="company-img">
                                <a href="<?= $current_url ?>scholarship-details.php?s_id=<?= $s_id ?>/<?= $id ?>"><img src="<?= $file_url ?>/<?= $img ?>" style="width:auto; height:120px"></a>
                            </div>
                            <div class="scholar-tittle scholar-tittle2">
                                <a href="<?= $current_url ?>scholarship-details.php?s_id=<?= $s_id ?>/<?= $id ?>">
                                    <h4><?= $sname ?></h4>
                                </a>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i><?= $loc ?></li>
                                    <?php
                                    $stmt_l = "SELECT * FROM `level` WHERE id IN ($level)";
                                    $result_l = mq($stmt_l);
                                    $name_level  = array();
                                    if ($result_l) {
                                        while ($row = mfa($result_l)) {
                                            $name_level[] = $row['level'];
                                        }
                                        $combinedLevel = implode(", ", $name_level);
                                        echo "<li><i class='bi bi-mortarboard-fill'></i>" . $combinedLevel . "</li>";
                                    }

                                    $stmt_f = "SELECT * FROM `field` WHERE id IN ($field)";
                                    $result_f = mq($stmt_f);
                                    $name_field  = array();
                                    if ($result_f) {
                                        while ($row = mfa($result_f)) {
                                            $name_field[] = $row['field'];
                                        }
                                        $combinedField = implode(", ", $name_field);
                                        echo " <li><i class='fa fa-university'></i>" . $combinedField . "</li>";
                                    }

                                    $stmt_c = "SELECT * FROM `cat` WHERE id IN ($cat)";
                                    $result_c = mq($stmt_c);
                                    $name_cat  = array();
                                    if ($result_c) {
                                        while ($row = mfa($result_c)) {
                                            $name_cat[] = $row['cat'];
                                        }
                                        $combinedCat = implode(", ", $name_cat);
                                        echo " <li><i class='bi bi-book-half'></i>" . $combinedCat . "</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link items-link2 f-right">
                            <a href="<?= $current_url ?>scholarship-details.php?s_id=<?= $s_id ?>/<?= $id ?>"><?= $dateDifference ?></a>
                        </div>
                    </div>
        <?php }
            } else {
                echo "<p class='text-center'>No scholarship display</p>";
            }
        }
        ?>
    </div>
    <script type="text/javascript" src="<?= $file_url ?>js/virtual-select.min.js"></script>
    <script type="text/javascript">
        VirtualSelect.init({
            ele: '#multipleSelect'
        });
    </script>
    <!-- Widgets End -->
    <?php include_once("footer.php") ?>