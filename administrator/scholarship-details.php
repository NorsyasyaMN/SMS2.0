<? include_once("header.php") ?>
<div class="container-fluid pt-4 px-4">
    <h2>Applicant Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form class="bg-light rounded p-4">
        <div class="d-flex justify-content-between">
            <div>
                <h5>Applicant Information</h5>
                <p>Update some personal information. The data will never be publicly available.</p>
            </div>
            <div>
                <button type="button" class="btn btn-success ms-2">Approved</button>
            </div>
        </div>
        <hr>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Fullname:</label>
            <div class="col-sm-10">
                <input class="form-control" value="Anis Nabilla Binti Suhaimi" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Organization Email:</label>
            <div class="col-sm-10">
                <input class="form-control" value="anis@gmail.com" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Phone:</label>
            <div class="col-sm-10">
                <input class="form-control" value="0103456789" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Location:</label>
            <div class="col-sm-10">
                <input class="form-control" value="No. 36, Jalan Lengkok, Seremban 59200, Negeri Sembilan" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Organization:</label>
            <div class="col-sm-10">
                <input class="form-control" value="MUMU College" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">IC Number:</label>
            <div class="col-sm-10">
                <input class="form-control" value="1234-14-0987" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Position:</label>
            <div class="col-sm-10">
                <input class="form-control" value="HR Administrator" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Certificate of Incoperation:</label>
            <div class="col-sm-10">
                <div class="d-flex text-center">
                    <a class="btn btn-sm btn-primary w-auto me-2" href="#">View</a>
                    <a class="btn btn-sm btn-primary w-auto" href="#">Download</a>
                </div>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Bussines License:</label>
            <div class="col-sm-10">
                <div class="d-flex text-center">
                    <a class="btn btn-sm btn-primary w-auto me-2" href="#">View</a>
                    <a class="btn btn-sm btn-primary w-auto" href="#">Download</a>
                </div>
            </div>
        </div>
        <div class="pb-3 row">
            <label for="role" class="form-label col-sm-2">Verify:</label>
            <div class="col-sm-10">
                <select id="role" class="form-select form-control bg-white">
                    <option selected>Status</option>
                    <option value="1">Approved</option>
                    <option value="2">Rejected</option>
                </select>
            </div>
        </div>
        <div class="pb-3 row">
            <legend class="col-form-label col-sm-2 pt-0">Disable Content</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                        Disable
                    </label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-sm btn-outline-dark w-auto" href="index.php">Cancel</a>
            <a class="btn btn-sm btn-primary w-auto" href="index.php">Save changes</a>
        </div>
    </form>
</div>
<!-- Widgets End -->
<script>
    // Ensure DOM is fully loaded before executing script
    $(document).ready(function() {
        // Initialize datepicker
        $('#datepicker').datepicker();
    });
</script>
<? include_once("footer.php") ?>