<?php
include_once("header.php")
?>
<div class="container-fluid pt-4 px-4">
    <h2>Scholarships</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-3 px-4">
    <div class="d-flex mb-4">
        <input class="form-control bg-transparent" type="text" placeholder="Search">
        <button type="button" class="btn btn-primary ms-2">Search</button>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-4 mb-4">
            <div class="filter-section bg-light p-3">
                <h6>Filter by Category</h6>
                <div class="level mb-3">
                    <h6>Level</h6>
                    <!-- Category Level Checkboxes -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="category1">
                        <label class="form-check-label" for="category1">PHD</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="category2">
                        <label class="form-check-label" for="category2">Master</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="category3">
                        <label class="form-check-label" for="category3">Degree</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="category4">
                        <label class="form-check-label" for="category3">STPM</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="category5">
                        <label class="form-check-label" for="category3">SPM</label>
                    </div>
                </div>
                <!-- Category Level Checkboxes -->
                <div class="category mb-3">
                    <h6>Categories</h6>
                    <?php
                    $stmt_c = "SELECT * FROM `cat`";
                    $result_c = mq($stmt_c);
                    if (mnr($result_c) > 0) {
                        while ($row = mfa($result_c)) {
                            $name = $row['cat'];
                            $c_id = $row['id'];
                    ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="select">
                                <label class="form-check-label"><?= $name ?></label>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <button type="button" class="btn btn-primary mt-3 w-auto">Apply Filters</button>
            </div>
        </div>
        <!-- Scholarship Card 1 -->
        <div class="col-xl-9 col-lg-9 col-md-8 pt-3 bg-light">
            <?php
            $stmt_s = "SELECT * FROM `scholarship`";
            $result_s = mq($stmt_s);
            if ($result_s) {
                while ($row = mfa($result_s)) {
                    $s_id = $row['id'];
                    $img = $row['img'];
                    $loc = $row['location'];
                    $sname = $row['scholar_name'];
                    $level = $row['level'];
                    $field = $row['field']; ?>
                    <div class="single-scholar-items bg-dark-light mb-4">
                        <div class="scholar-items">
                            <div class="company-img">
                                <a href="<?= $current_url ?>scholarship-details.php?s_id=<?=$s_id?>/<?= $id ?>"><img src="<?= $current_url ?>/<?= $img ?>" style="width:auto; height:120px"></a>
                            </div>
                            <div class="scholar-tittle scholar-tittle2">
                                <a href="<?= $current_url ?>scholarship-details.php?s_id=<?=$s_id?>/<?= $id ?>">
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
                                        echo "<li>$combinedLevel</li>";
                                    }
                                    ?>
                                    <li><?= $field ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link items-link2 f-right">
                            <a href="scholarship-details.php">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
            <?php }
            }
            ?>
        </div>
    </div>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>