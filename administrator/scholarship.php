<?php include_once("header.php");
?>
<div class="container-fluid pt-4 px-4">
    <h2>Registered Scholarship</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="d-flex mb-4">
        <input class="form-control bg-transparent" type="text" placeholder="Search">
        <button type="button" class="btn btn-primary ms-2">Search</button>
    </div>
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">List of Scholarship Provider</h4>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col" width="30">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Organizer</th>
                        <th scope="col" width="30">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $stmt = "SELECT * FROM `scholarship` INNER JOIN `register` ON scholarship.u_id = register.id";
                    $result = mq($stmt);
                    if ($result) {
                        while ($row = mfa($result)) {
                            $id = $row['u_id'];
                            $name = $row['name'];
                            $scholar_name = $row['scholar_name'];
                            $verify = $row['verify'];
                            $btn = btnStatus($verify); ?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $name ?></td>
                                <td><?= $scholar_name ?></td>
                                <td><a class="btn btn-sm <?= $btn ?>" href="scholarship-details.php?id=<?= $id ?>"><?= $verify ?></a></td>
                            </tr>
                    <?php
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