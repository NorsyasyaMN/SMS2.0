<?php include_once("header.php") ?>
<div class="container-fluid pt-4 px-4">
    <h2>Application History</h2>
</div>

<!-- Widgets Start -->

<div class="container-fluid pt-4 px-4">
    <div class="d-flex mb-4">
        <input class="form-control bg-transparent" type="text" placeholder="Search">
        <button type="button" class="btn btn-primary ms-2">Search</button>
    </div>
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Student Application</h4>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col" width="30">No</th>
                        <th scope="col">Scholarship</th>
                        <th scope="col">Date</th>
                        <th scope="col" width="30">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    $count = 1;
                    $stmt = "SELECT * FROM `scholarship` INNER JOIN `application` ON scholarship.u_id = application.s_id WHERE application.u_id = $d_id";
                    $result = mq($stmt);
                    if ($result) {
                        if (mnr($result) > 0) {
                            while ($row = mfa($result)) {
                                $s_id = $row['s_id'];
                                $s_name = $row['scholar_name'];
                                $date = $row['date'];
                                $status = $row['status'];
                    ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $s_name ?></td>
                                    <td><?= $date ?></td>
                                    <?php $btn = btnStatus($status)?>
                                    <td><a class="btn btn-sm <?=$btn?>" href="<?= $current_url ?>application-details.php?s_id=<?=$s_id?>/<?= $id ?>"><?=$status?></a></td>
                                </tr>

                    <?php
                                $count++;
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="container-fluid pt-4 px-4">
    <div class="d-flex mb-4">
        <input class="form-control bg-transparent" type="text" placeholder="Search">
        <button type="button" class="btn btn-primary ms-2">Search</button>
    </div>
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Star Scholarship</h4>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col" width="30">No</th>
                        <th scope="col">Scholarship</th>
                        <th scope="col">Date</th>
                        <th scope="col" width="30">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>MMU Scholarship</td>
                        <td>2024-03-30</td>
                        <td><a class="btn btn-sm btn-primary" href="#">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Widgets End -->
<?php include_once("footer.php") ?>