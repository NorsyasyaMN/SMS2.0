<? include_once("header.php") ?>
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
                    <tr>
                        <td>1</td>
                        <td>Ali Bin Abu</td>
                        <td>MUMU College</td>
                        <td><a class="btn btn-sm btn-success" href="scholarship-details.php">Approved</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Samad Bin Yaakob</td>
                        <td>Taylor College</td>
                        <td><a class="btn btn-sm btn-warning" href="">Pending</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Natasha Binti Said</td>
                        <td>SeGi College</td>
                        <td><a class="btn btn-sm btn-warning" href="">Pending</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Wawa Binti Zainal</td>
                        <td>MUMU College</td>
                        <td><a class="btn btn-sm btn-warning" href="">Pending</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Ahmad Bin Abu</td>
                        <td>MUMU College</td>
                        <td><a class="btn btn-sm btn-warning" href="">Pending</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="pb-3 row">
            <legend class="col-form-label col-sm-2 pt-0">Disable website</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                        Yes
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Widgets End -->
<? include_once("footer.php") ?>