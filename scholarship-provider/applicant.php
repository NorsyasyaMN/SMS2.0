<?php include_once("header.php");

$s_stmt = '';
$f_stmt = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['search'])) {

        $search = $_POST['name'];
        $s_stmt = "AND LOWER(name) LIKE LOWER('%$search%')";
    }

    if (isset($_POST['filter'])) {

        $filter = $_POST['status'];
        $f_stmt = "AND `status` LIKE '$filter'";
    }
}
?>
<div class="container-fluid pt-4 px-4">
    <h2>List of Applicants</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form method="POST" action="">
        <div class="d-flex mb-2">
            <input class="form-control bg-transparent" type="text" name="name" placeholder="Search">
            <button type="submit" name="search" class="btn btn-primary ms-2">Search</button>
        </div>
    </form>

    <div class="row pt-4">
        <div class="col-xl-3 col-lg-3 col-md-4 mb-4">
            <form action="" method="post">
                <div class="filter-section bg-light p-3" style="border-radius:5px">
                    <h6>Filter by Category</h6>
                    <div class="level mb-2">
                        <h7>Status</h7>
                        <select name="status" class="form-select form-control bg-white">
                            <option value="" disabled selected>Select status</option>
                            <option value="Pending">Pending</option>
                            <option value="Shortlisted">Shortlisted</option>
                            <option value="Accepted">Accepted</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    <button type="submit" name="filter" class="btn btn-primary w-auto mt-3">Apply Filters</button>
                </div>
            </form>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-8" style="border-radius:5px">
            <div class="bg-light text-center rounded p-4 bg-light">
                <div class="table-responsive">
                    <table class="table text-start align-middle table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col" width="30">No</th>
                                <th scope="col">Applicant Name</th>
                                <th scope="col">Date</th>
                                <th scope="col" width="30">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = "SELECT * FROM `application` WHERE s_id = $d_id $s_stmt $f_stmt  ORDER BY `date` ASC";
                            $result = mq($stmt);
                            $count = 1;
                            if ($result) {
                                if (mnr($result) > 0) {
                                    while ($row = mfa($result)) {
                                        $u_id = $row['id'];
                                        $name = $row['name'];
                                        $date = $row['date'];
                                        $status = $row['status'];
                            ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $name ?></td>
                                            <td><?= $date ?></td>
                                            <?php $btn = btnStatus($status) ?>
                                            <td class="<?=$display_p?>"><a class="btn btn-sm <?= $btn?>" href="<?= $current_url ?>applicant-details.php?u_id=<?= $u_id ?>/<?= $id ?>"><?= $status ?></a></td>
                                            <td class="<?=$display?>"><a class="btn btn-sm <?= $btn?>" href="<?= $current_url ?>applicant-details.php?u_id=<?= $u_id ?>&p_id=<?=$s_id?>/<?= $id ?>"><?= $status ?></a></td>
                                        </tr>
                            <?php $count++;
                                    }
                                } else {
                                    echo "<tr><td class='text-center' colspan='5'><p>No applicant </p></td></tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= $file_url ?>js/virtual-select.min.js"></script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: '#multipleSelect'
    });
</script>
<!-- Widgets End -->
<?php include_once("footer.php") ?>