// Image Preview Functionality
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
            uploadArea.style.border = '2px solid #2ecc71';
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
    uploadArea.style.border = '2px dashed #3498db';
}

// Toggle Optional Fields Visibility
document.addEventListener('DOMContentLoaded', function() {
    const optionalSection = document.querySelector('.optional-section');
    const toggleButton = document.createElement('button');
    
    toggleButton.type = 'button';
    toggleButton.className = 'toggle-optional';
    toggleButton.textContent = 'Show Student Information';
    toggleButton.style.display = 'block';
    toggleButton.style.margin = '10px auto';
    toggleButton.style.padding = '8px 15px';
    toggleButton.style.backgroundColor = '#ecf0f1';
    toggleButton.style.border = '1px solid #bdc3c7';
    toggleButton.style.borderRadius = '5px';
    toggleButton.style.cursor = 'pointer';
    
    optionalSection.parentNode.insertBefore(toggleButton, optionalSection);
    optionalSection.style.display = 'none';
    
    toggleButton.addEventListener('click', function() {
        if (optionalSection.style.display === 'none') {
            optionalSection.style.display = 'block';
            toggleButton.textContent = 'Hide Student Information';
        } else {
            optionalSection.style.display = 'none';
            toggleButton.textContent = 'Show Student Information';
        }
    });
});