<?php include_once("header.php") ?>
<div class="container-fluid pt-4 px-4">
    <h2>List of User</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="d-flex mb-4">
        <input class="form-control bg-transparent" type="text" placeholder="Search">
        <button type="button" class="btn btn-primary ms-2">Search</button>
    </div>
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
                    <tr>
                        <td>1</td>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>syasyamn</td>
                        <td class="d-none d-md-table-cell d-xl-table-cell">01 Jan 43</td>
                        <td><a class="btn btn-sm btn-primary" href="">Administrator</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>aisyahmn</td>
                        <td class="d-none d-md-table-cell d-xl-table-cell">01 Jan 45</td>
                        <td><a class="btn btn-sm btn-secondary" href="">Normal user</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>syamsuzzamans</td>
                        <td class="d-none d-md-table-cell d-xl-table-cell">01 Jan 45</td>
                        <td><a class="btn btn-sm btn-secondary" href="">Normal user</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>ahmadali</td>
                        <td class="d-none d-md-table-cell d-xl-table-cell">01 Jan 46</td>
                        <td><a class="btn btn-sm btn-secondary" href="">Normal user</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>ahmadabu</td>
                        <td class="d-none d-md-table-cell d-xl-table-cell">01 Jan 47</td>
                        <td><a class="btn btn-sm btn-primary" href="">Administrator</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>