<?php include_once("header.php") ?>
<div class="container-fluid pt-4 px-4">
    <h2>Document</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="d-flex mb-4">
        <input class="form-control bg-transparent" type="text" placeholder="Search">
        <button type="button" class="btn btn-primary ms-2">Search</button>
    </div>
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">List of document</h4>
            <div>
                <a href="#"><i class="fas fa-trash-alt fs-4"></i></a>
                <a href="document-details.php"><i class="fas fa-plus-square fs-4"></i></a>
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
                    <tr>
                        <td>1</td>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>INV-0123</td>
                        <td class="d-none d-md-table-cell d-xl-table-cell">01 Jan 43</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>INV-0123</td>
                        <td class="d-none d-md-table-cell d-xl-table-cell">01 Jan 45</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>INV-0123</td>
                        <td class="d-none d-md-table-cell d-xl-table-cell">01 Jan 45</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>INV-0123</td>
                        <td class="d-none d-md-table-cell d-xl-table-cell">01 Jan 46</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>INV-0123</td>
                        <td class="d-none d-md-table-cell d-xl-table-cell">01 Jan 47</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>