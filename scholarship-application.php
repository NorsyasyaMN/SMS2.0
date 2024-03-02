<? include_once("header.php") ?>
<div class="container-fluid pt-4 px-4">
    <h2>Application Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form class="bg-light rounded p-4">
        <h5>Applicant Information</h5>
        <p>Update some personal information. The data will never be publicly available.</p>
        <hr>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Fullname:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Fullname">
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Email:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Phone:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Phone">
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Location:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Location">
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Gender:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Gender">
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">IC Number:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Identity Card Number">
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Occupation:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Occupation">
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Parents Identity Card:</label>
            <div class="col-sm-10">
                <select id="role" class="form-select form-control bg-white">
                    <option selected>Select Document</option>
                    <option value="1">Parents Identity Card</option>
                    <option value="1">Payslip</option>
                    <option value="1">Student Letter</option>
                    <option value="1">Register Document</option>
                </select>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Payslip:</label>
            <div class="col-sm-10">
                <select id="role" class="form-select form-control bg-white">
                    <option selected>Select Document</option>
                    <option value="1">Parents Identity Card</option>
                    <option value="1">Payslip</option>
                    <option value="1">Student Letter</option>
                    <option value="1">Register Document</option>
                </select>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Student Letter:</label>
            <div class="col-sm-10">
                <select id="role" class="form-select form-control bg-white">
                    <option selected>Select Document</option>
                    <option value="1">Parents Identity Card</option>
                    <option value="1">Payslip</option>
                    <option value="1">Student Letter</option>
                    <option value="1">Register Document</option>
                </select>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Register Document:</label>
            <div class="col-sm-10">
                <select id="role" class="form-select form-control bg-white">
                    <option selected>Select Document</option>
                    <option value="1">Parents Identity Card</option>
                    <option value="1">Payslip</option>
                    <option value="1">Student Letter</option>
                    <option value="1">Register Document</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-sm btn-outline-dark w-auto" href="scholarship.php">Back</a>
            <a class="btn btn-sm btn-primary w-auto" href="scholarship-details.php">Submit</a>
        </div>
    </form>
</div>
<!-- Widgets End -->
<? include_once("footer.php") ?>