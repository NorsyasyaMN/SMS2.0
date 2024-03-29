<?php
include_once("header.php");
?>
<div class="container-fluid pt-4 px-4">
    <h2>User Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <form method="post" action="<?= $current_url?>user.php/<?= $id ?>">
            <h5>Add new user</h5>
            <p>Add new user to allow account management and access</p>
            <hr>
            <div class=" pb-3 row">
                <label for="username" class="form-label col-sm-2">Name:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="name">
                </div>
            </div>
            <div class="pb-3 row">
                <label for="username" class="form-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="pb-3 row">
                <label for="username" class="form-label col-sm-2">Clerk ID:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="c_id">
                </div>
            </div>
            <div class="pb-3 row">
                <label for="password" class="form-label col-sm-2">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="pb-3 row">
                <label for="Role" class="form-label col-sm-2">Role:</label>
                <div class="col-sm-10">
                    <select name="role" class="form-select form-control">
                        <option selected>Choose...</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Clerk">Clerk</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a class="btn btn-sm btn-outline-dark" href="<?= $current_url ?>user.php/<?= $id ?>">Cancel</a>
                <button class="btn btn-sm btn-primary w-auto" type="submit" name="submit">Save changes</button>
            </div>
        </form>
    </div>
</div>
<!-- Widgets End -->
<?php
include_once("footer.php") 
?>