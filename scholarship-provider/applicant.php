<?php include_once("header.php") ?>
<div class="container-fluid pt-4 px-4">
    <h2>List of Applicants</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="d-flex mb-4">
        <input class="form-control bg-transparent" type="text" placeholder="Search">
        <button type="button" class="btn btn-primary ms-2">Search</button>
    </div>
    <div class="bg-light text-center rounded p-4">
        <!-- <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Approved Application</h4>
        </div> -->
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
                    $stmt = "SELECT * FROM `application` WHERE s_id = $d_id";
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
                                    <td><a class="btn btn-sm <?= $btn ?>" href="<?= $current_url ?>applicant-details.php?u_id=<?= $u_id ?>/<?= $id ?>"><?= $status ?></a></td>
                                </tr>
                    <?php $count++;
                            }
                        }else{
                            echo "<tr><td class='text-center' colspan='5'><p>No applicant </p></td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Widgets End -->
<?php include_once("footer.php") ?>