<?php
include_once("header.php");
$stmt_s = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $pass = $_POST["password"];
        $c_id = $_POST["c_id"];
        $role = $_POST["role"];
        $date = date("Y-m-d");

        $stmt = "INSERT INTO `user`(`p_id`, `name`, `email`, `pass`, `c_id`, `role`,`date`) VALUES ('$d_id','$name','$email','$pass','$c_id', '$role', '$date')";
        $result = mq("$stmt");
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Data saved successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show float-end col-sm-4 m-3" role="alert">Error adding user.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }

    if (isset($_POST['delete_selected'])) {
        // Check if any document is selected
        if (!empty($_POST['users'])) {
            $userToDelete = implode(',', $_POST['users']);

            // Delete selected documents from database
            $stmt = "DELETE FROM `user` WHERE id IN ($userToDelete)";
            $result = mq($stmt);

            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Succesfully deleted.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
                echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">Error deleting document.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        } else {
            echo '<div class="alert alert-success alert-dismissible fade show col-sm-4 m-3 float-end" role="alert">No user selected.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }

    if (isset($_POST['search'])) {

        $search = $_POST['name'];
        $s_stmt = "AND LOWER(name) LIKE LOWER('%$search%')";
    }
}
?>
<div class="container-fluid pt-4 px-4">
    <h2>List of User</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form method="POST" action="">
        <div class="d-flex mb-4">
            <input class="form-control bg-transparent" type="text" placeholder="Search" name="name">
            <button type="submit" name="search" class="btn btn-primary ms-2">Search</button>
        </div>
    </form>
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">List of Users</h4>
            <div>
                <button class="btn btn-primary w-auto" name="delete_selected" type="submit" style="padding: 1px 6px;"><i class="fas fa-trash-alt"></i></button>
                <a class="btn btn-primary w-auto" style="padding: 1px 6px;" href="<?= $current_url ?>user-details.php/<?= $id ?>"><i class="fas fa-plus-square"></i></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th width="30" scope="col">No</th>
                        <th width="30" scope="col"></th>
                        <th scope="col">Username</th>
                        <th class="d-none d-md-table-cell d-xl-table-cell" scope="col">Date</th>
                        <th width="30" scope="col">Roles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt_y = "SELECT * FROM `user` WHERE p_id = '$d_id' $stmt_s";
                    $result_y = mq("$stmt_y");
                    $count = 1;
                    if ($result_y) {
                        if (mnr($result_y) > 0) {
                            while ($row = mfa($result_y)) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $date = $row['date'];
                                $role = $row['role'];
                    ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><input class="user-check" type="checkbox" value="<?= $id ?>" name="users[]"></td>
                                    <td><?= $name ?></td>
                                    <td class="d-none d-md-table-cell d-xl-table-cell"><?= $date ?></td>
                                    <td><a class="btn btn-sm btn-primary" href=""><?= $role ?></a></td>
                                </tr>
                    <?php
                                $count++;
                            }
                        } else {
                            echo "<tr><td class='text-center' colspan='5'><p>No users added</p></td></tr>";
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