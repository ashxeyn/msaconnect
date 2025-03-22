
    function openModal(photoNumber) {
        document.getElementById("selectedPhoto").value = photoNumber;
        var modal = new bootstrap.Modal(document.getElementById("uploadModal"));
        modal.show();
    }

    function savePhoto() {
        let photoNumber = document.getElementById("selectedPhoto").value;
        let fileInput = document.getElementById("fileInput");

        if (fileInput.files.length > 0) {
            let reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("img" + photoNumber).src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
        }

        let modal = bootstrap.Modal.getInstance(document.getElementById("uploadModal"));
        modal.hide();
    }
