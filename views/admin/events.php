<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event Photos</title>
    <link rel="stylesheet" href="../../css/adminevents.css?v=<?php echo time(); ?>">
        
</head>
<body>



<div class="container">
    <h2 class="">Manage Event Photos</h2>
    
    <div class="photo-container">
        <!-- Photo 1 -->
        <div class="photo-card">
            <h5>Event 1</h5>
            <img src="uploads/photo1.jpg" id="img1" alt="Event Photo">
            <button class="btn btn-primary mt-2" onclick="openModal(1)">Upload</button>
        </div>
        
        <!-- Photo 2 -->
        <div class="photo-card">
            <h5>Event 2</h5>
            <img src="uploads/photo2.jpg" id="img2" alt="Event Photo">
            <button class="btn btn-primary mt-2" onclick="openModal(2)">Upload</button>
        </div>

        <!-- Photo 3 -->
        <div class="photo-card">
            <h5>Event 3</h5>
            <img src="uploads/photo3.jpg" id="img3" alt="Event Photo">
            <button class="btn btn-primary mt-2" onclick="openModal(3)">Upload</button>
        </div>

        <!-- Photo 4 -->
        <div class="photo-card">
            <h5>Event 4</h5>
            <img src="uploads/photo4.jpg" id="img4" alt="Event Photo">
            <button class="btn btn-primary mt-2" onclick="openModal(4)">Upload</button>
        </div>
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload New Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="file" id="fileInput" class="form-control">
                <input type="hidden" id="selectedPhoto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="savePhoto()">Save</button>
            </div>
        </div>
    </div>
</div>


<script src="../../js/adminevents.js?v=<?php echo time(); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
