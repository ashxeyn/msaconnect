const form = document.querySelector('form');
const imageInput = document.getElementById('image');
const previewImg = document.getElementById('preview-img');
const uploadPlaceholder = document.getElementById('upload-placeholder');
const previewContainer = document.getElementById('image-preview');
const backButton = document.querySelector('.back-button');

if (imageInput) {
    imageInput.addEventListener('change', previewImage);
}

function previewImage(event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = (e) => {
        previewImg.src = e.target.result;
        uploadPlaceholder.style.display = 'none';
        previewContainer.style.display = 'block';
    };
    reader.readAsDataURL(file);
}

function removeImage() {
    imageInput.value = '';
    uploadPlaceholder.style.display = 'block';
    previewContainer.style.display = 'none';
}

if (form) {
    form.addEventListener('submit', validateForm);
}

function validateForm(e) {
    const registrationType = document.querySelector('[name="registration_type"]')?.value;
    let isValid = true;

    if (!document.getElementById('name').value.trim()) {
        alert('Name is required!');
        isValid = false;
    }

    if (registrationType === 'online') {
        if (!document.getElementById('address').value.trim()) {
            alert('Address is required for online registration!');
            isValid = false;
        }
    }

    if (registrationType === 'onsite') {
        if (!document.getElementById('college').value.trim()) {
            alert('College is required for onsite registration!');
            isValid = false;
        }
    }

    if (!imageInput.files.length && !document.querySelector('[name="existing_image"]').value) {
        alert('Please upload your COR screenshot!');
        isValid = false;
    }

    if (!isValid) {
        e.preventDefault();
    }
}

if (backButton) {
    backButton.addEventListener('click', () => {
        window.location.href = '?reset=1';
    });
}

const programSelect = document.getElementById('program');
if (programSelect) {
    programSelect.addEventListener('change', updateYearLevels);
}

function updateYearLevels() {
    const programId = this.value;
    const yearLevelSelect = document.getElementById('year_level');
}