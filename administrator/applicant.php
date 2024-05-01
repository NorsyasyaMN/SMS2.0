<?php include_once("header.php");
?>
<div class="container-fluid pt-4 px-4">
    <h2>Registered Applicant</h2>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="d-flex mb-4">
        <input class="form-control bg-transparent" type="text" placeholder="Search">
        <button type="button" class="btn btn-primary ms-2">Search</button>
    </div>
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">List of Applicant</h4>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col" width="30">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Studies</th>
                        <th scope="col" width="30">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $stmt_a = "SELECT * FROM `applicant` INNER JOIN `register` ON applicant.u_id = register.id";
                    $result_a = mq($stmt_a);
                    if ($result_a) {
                        while ($row = mfa($result_a)) {
                            $id = $row['u_id'];
                            $name = $row['name'];
                            $stud = $row['stud'];
                            $verify = $row['verify'];
                            $btn = btnStatus($verify);
                            $stmt_f = "SELECT * FROM `field` WHERE id IN ($stud)";
                            $result_f = mq($stmt_f);
                            if ($result_f) {
                                while ($row = mfa($result_f)) {
                                    $name_field = $row['field']; ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $name ?></td>
                                        <td><?= $name_field ?></td>
                                        <td><a class="btn btn-sm <?= $btn ?>" href="applicant-details.php?id=<?= $id ?>"><?= $verify ?></a></td>
                                    </tr>
                    <?php
                                }
                            }

                            $count++;
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