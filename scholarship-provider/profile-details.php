<? include_once("header.php") ?>
<div class="container-fluid pt-4 px-4">
    <h2>Applicant Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <form>
        <!-- General Settings -->
        <div class="mb-3 bg-light rounded p-4">
            <h5>Applicant Information</h5>
            <p>Update some personal information. The data will never be publicly available.</p>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Profile Photo:</label>
                <div class="col-sm-10">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle me-3" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <a href="#"><button class="btn btn-outline-primary btn-sm follow w-auto me-3">Change</button></a>
                        <a href="#"><button class="btn btn-outline-primary btn-sm follow w-auto me-3">Remove</button></a>
                    </div>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Cover Photo:</label>
                <div class="col-sm-10">
                    <div id="drag-drop-area" class="mb-3">
                        <p>Drag & drop your file here or <label for="file-input" class="text-primary">browse</label>.</p>
                        <input type="file" id="file-input" accept="image/*">
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Information -->
        <div class="mb-3 bg-light rounded p-4">
            <h5>Basic Information</h5>
            <p>Update some personal information. The data will never be publicly available.</p>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Organization Name:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter organization name" name="org" value="MMU Organization">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Scholarship Name:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter scholarship name" name="scholarship" value="MMU Scholarship">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Bio:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter bio" name="bio" value="Chase your dream">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Location:</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Enter your location" name="loc" value="No. 36, Jalan Lengkok, Seremban 59200, Negeri Sembilan">
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Field Study Applicable:</label>
                <div class="col-sm-10">
                    <div class="d-none">
                        <input class="form-control" placeholder="Add field" type='text' name='option' id='option' />
                        <button class="btn btn-sm btn-primary w-auto" id='btnAdd'>Add Option</button>
                    </div>
                    <select class="form-select form-control bg-white" id="sel" name="sel">
                        <option value="">Other</option>
                    </select>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Course Level Applicable:</label>
                <div class="col-sm-10">
                    <div class="d-none">
                        <input class="form-control" placeholder="Add field" type='text' name='option' id='option' />
                        <button class="btn btn-sm btn-primary w-auto" id='btnAdd'>Add Option</button>
                    </div>
                    <select class="form-select form-control bg-white" id="sel" name="sel">
                        <option value="">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- Scholarship Details -->
        <div class="mb-3 bg-light rounded p-4">
            <h5>Scholarship Details</h5>
            <p>Update some personal information. The data will never be publicly available.</p>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Criteria:</label>
                <div class="col-sm-10">
                    <textarea id="editor" class="editor" name="editor" placeholder="Enter your text here..."></textarea>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Photo 1:</label>
                <div class="col-sm-10">
                    <div id="drag-drop-area" class="mb-3">
                        <p>Drag & drop your file here or <label for="file-input" class="text-primary">browse</label>.</p>
                        <input type="file" id="file-input" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Highlights:</label>
                <div class="col-sm-10">
                    <textarea id="editor" class="editor" name="editor" placeholder="Enter your text here..."></textarea>
                </div>
            </div>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Photo 2:</label>
                <div class="col-sm-10">
                    <div id="drag-drop-area" class="mb-3">
                        <p>Drag & drop your file here or <label for="file-input" class="text-primary">browse</label>.</p>
                        <input type="file" id="file-input" accept="image/*">
                    </div>
                </div>
            </div>
        </div>
        <!-- Display Document -->
        <div class="mb-3 bg-light rounded p-4">
            <h5>Document Display</h5>
            <p>Document to be downloaded by the applicant</p>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Document Name:</label>
                <div class="col-sm-10">
                    <select id="role" class="form-select form-control bg-white">
                        <option selected>Select Document</option>
                        <option value="1">INV-0123</option>
                        <option value="1">INV-0123</option>
                        <option value="1">INV-0123</option>
                        <option value="1">INV-0123</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3 bg-light rounded p-4">
            <h5>Document Needed</h5>
            <p>How many document needed to be upload by the applicant, seperate it by comma</p>
            <hr>
            <div class="pb-3 row">
                <label class="form-label col-sm-2">Document Name:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="document" class="document" name="document" placeholder="Document"></input>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between ">
            <a class="btn btn-sm btn-outline-dark w-auto" href="index.php">Cancel</a>
            <a class="btn btn-sm btn-primary w-auto" href="index.php">Save changes</a>
        </div>
    </form>
</div>
<!-- Widgets End -->

<? include_once("footer.php") ?>