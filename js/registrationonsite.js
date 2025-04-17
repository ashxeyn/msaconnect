function previewImage(event) {
    const uploadArea = document.getElementById('upload-area');
    const uploadPlaceholder = document.getElementById('upload-placeholder');
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            uploadPlaceholder.style.display = 'none';
            preview.style.display = 'block';
            uploadArea.style.border = '2px solid #1a9626';
        }
        
        reader.readAsDataURL(file);
    }
}

function removeImage() {
    const uploadArea = document.getElementById('upload-area');
    const uploadPlaceholder = document.getElementById('upload-placeholder');
    const preview = document.getElementById('image-preview');
    const fileInput = document.getElementById('image');
    
    fileInput.value = '';
    uploadPlaceholder.style.display = 'flex';
    preview.style.display = 'none';
    uploadArea.style.border = '2px dashed #1a9626';
}