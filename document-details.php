<?php include_once("header.php") ?>
<div class="container-fluid pt-4 px-4">
    <h2>Document Details</h2>
</div>

<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="pb-2">
            <label for="document" class="form-label">Document Name:</label>
            <input type="name" class="form-control" id="document" aria-describedby="document">
        </div>
        <div class="pb-2">
            <label for="upload" class="form-label">Document Upload:</label>
            <div id="drag-drop-area" class="mb-3">
                <p>Drag & drop your file here or <label for="file-input" class="text-primary">browse</label>.</p>
                <input type="file" id="file-input" accept="image/*">
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-sm btn-outline-dark" href="document.php">Cancel</a>
            <a class="btn btn-sm btn-primary w-auto" href="document.php">Save changes</a>
        </div>
    </div>
</div>
<!-- Widgets End -->
<?php include_once("footer.php") ?>