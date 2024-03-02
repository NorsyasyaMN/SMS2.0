<? include_once("header.php") ?>
<div class="container-fluid pt-4 px-4">
    <h2>Application Details</h2>
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
                <input class="form-control" value="Anis Nabila Binti Suhaimi" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Email:</label>
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
            <label class="form-label col-sm-2">Gender:</label>
            <div class="col-sm-10">
                <input class="form-control" value="Female" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">IC Number:</label>
            <div class="col-sm-10">
                <input class="form-control" value="1234-14-0987" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Occupation:</label>
            <div class="col-sm-10">
                <input class="form-control" value="Student" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Parents Identity Card:</label>
            <div class="col-sm-10">
                <div class="d-flex text-center">
                    <a class="btn btn-sm btn-primary w-auto me-2" href="#">View</a>
                    <a class="btn btn-sm btn-primary w-auto" href="#">Download</a>
                </div>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Payslip:</label>
            <div class="col-sm-10">
                <div class="d-flex text-center">
                    <a class="btn btn-sm btn-primary w-auto me-2" href="#">View</a>
                    <a class="btn btn-sm btn-primary w-auto" href="#">Download</a>
                </div>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Student Letter:</label>
            <div class="col-sm-10">
                <div class="d-flex text-center">
                    <a class="btn btn-sm btn-primary w-auto me-2" href="#">View</a>
                    <a class="btn btn-sm btn-primary w-auto" href="#">Download</a>
                </div>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Register Document:</label>
            <div class="col-sm-10">
                <div class="d-flex text-center">
                    <a class="btn btn-sm btn-primary w-auto me-2" href="#">View</a>
                    <a class="btn btn-sm btn-primary w-auto" href="#">Download</a>
                </div>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Remark:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Remark" value="Great" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Interview Link:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Interview link" value="https//:test.com/interview1" disabled>
            </div>
        </div>
        <div class="pb-3 row">
            <label class="form-label col-sm-2">Interview Date:</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Interview Date" value="12 January 2023 1124" disabled>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-sm btn-outline-dark w-auto" href="application.php">Back</a>
        </div>
    </form>
</div>
<!-- Widgets End -->
<? include_once("footer.php") ?>