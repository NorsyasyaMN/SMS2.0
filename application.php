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
                    <tr>
                        <td>1</td>
                        <td>INV-0123</td>
                        <td>01 Jan 43</td>
                        <td><a class="btn btn-sm btn-success" href="application-details.php">Approved</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>INV-0123</td>
                        <td>01 Jan 45</td>
                        <td><a class="btn btn-sm btn-warning" href="">Pending</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>INV-0123</td>
                        <td>01 Jan 45</td>
                        <td><a class="btn btn-sm btn-warning" href="">Pending</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>INV-0123</td>
                        <td>01 Jan 46</td>
                        <td><a class="btn btn-sm btn-warning" href="">Pending</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>INV-0123</td>
                        <td>01 Jan 47</td>
                        <td><a class="btn btn-sm btn-warning" href="">Pending</a></td>
                    </tr>
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
                        <th scope="col" width="30">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    $stmt = ""
                    ?>
                    <tr>
                        <td>1</td>
                        <td>INV-0123</td>
                        <td>01 Jan 43</td>
                        <td><a class="btn btn-sm btn-primary" href="scholarship-details.php">Detail</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>INV-0123</td>
                        <td>01 Jan 45</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>INV-0123</td>
                        <td>01 Jan 45</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>INV-0123</td>
                        <td>01 Jan 46</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>INV-0123</td>
                        <td>01 Jan 47</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>