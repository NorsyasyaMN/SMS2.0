<?php include_once("header.php") ?>
<div class="container-fluid pt-4 px-4">
    <h2>User Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form class="bg-light rounded p-4">
        <h5>Add new user</h5>
        <p>Add new user to allow account management and access</p>
        <hr>
        <div class="pb-3 row">
            <label for="username" class="form-label col-sm-2">Username:</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" id="username" aria-describedby="username">
            </div>
        </div>
        <div class="pb-3 row">
            <label for="password" class="form-label col-sm-2">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" aria-describedby="password">
            </div>
        </div>
        <div class="pb-3 row">
            <label for="Role" class="form-label col-sm-2">Role:</label>
            <div class="col-sm-10">
                <select id="role" class="form-select form-control">
                    <option selected>Choose...</option>
                    <option value="1">Administrator</option>
                    <option value="1">Normal User</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-sm btn-outline-dark" href="<?= $current_url ?>user.php/<?= $id ?>">Cancel</a>
            <button class="btn btn-sm btn-primary w-auto" type="submit" name="submit">Save changes</button>
        </div>
    </form>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>