<?php
include_once("header.php");
$count = 1;
$s_stmt = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $date = date("Y-m-d");

        // Check if file is selected
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];

            // File properties
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
        }

        $target_dir = "../files/";
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($file_tmp, $target_file)) {
            // File uploaded successfully, now insert into database
            $result = mq("INSERT INTO `file`(`u_id`, `name`, `doc`, `date`) VALUES ('$d_id','$name','$target_file', '$date')");
            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Data saved successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
                echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error uploading file.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-4" role="alert">Error uploading data.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';;
        }
    }

    if (isset($_POST['delete_selected'])) {
        // Check if any document is selected
        if (!empty($_POST['document'])) {
            $documentsToDelete = implode(',', $_POST['document']);

            // Delete selected documents from database
            $stmt = "DELETE FROM `file` WHERE id IN ($documentsToDelete)";
            $result = mq($stmt);

            if ($stmt) {
                echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Succesfully deleted.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
                echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">Error deleting document.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        } else {
            echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-4 float-end" role="alert">No document selected.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }

    if (isset($_POST['search'])) {
        
        $search = $_POST['name'];
        $s_stmt = "AND LOWER(name) LIKE LOWER('%$search%')";
    }
}
?>
<div class="container-fluid pt-4 px-4">
    <h2>Document</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form method="POST" action="">
        <div class="d-flex mb-4">
            <input class="form-control bg-transparent" type="text" placeholder="Search" name="name">
            <button type="submit" name="search" class="btn btn-primary ms-2" >Search</button>
        </div> 
    </form>
    <div class="bg-light text-center rounded p-4">
        <form method="POST" action="">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="mb-0 text-nowrap">List of document</h4>
                <div>
                    <button class="btn btn-primary w-auto" name="delete_selected" type="submit" style="padding: 1px 6px;"><i class="fas fa-trash-alt"></i></button>
                    <a class="btn btn-primary w-auto" style="padding: 1px 6px;" href="<?= $current_url ?>document-details.php/<?= $id ?>"><i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th width="30" scope="col">No</th>
                            <th width="30" scope="col"></th>
                            <th scope="col">Document</th>
                            <th class="d-none d-md-table-cell d-xl-table-cell" scope="col">Date</th>
                            <th width="30" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = "SELECT * FROM `file` WHERE u_id = '$d_id' $s_stmt";
                        $result = mq($stmt);
                        if ($result) {
                            while ($row = mfa($result)) {
                                $doc_id = $row['id'];
                                $name = $row['name'];
                                $file = $current_url . $row['doc'];
                                $date = $row['date']; ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><input class="document-check" type="checkbox" value="<?= $doc_id ?>" name="document[]"></td>
                                    <td><?= $name ?></td>
                                    <td class="d-none d-md-table-cell d-xl-table-cell"><?= $date ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="<?= $file ?>" target="_blank">Detail</a></td>
                                </tr>
                                <?php $count++;
                            } ?><?php
                            } else {
                                die('Query execution failed: ' . mysqli_error($conn));
                            }
                                ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>