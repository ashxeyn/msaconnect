<div class="modal fade" id="addEditAboutModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="aboutForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="aboutModalTitle">Add About</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="aboutId" name="aboutId">
                    <div class="mb-3">
                        <label class="form-label">Mission</label>
                        <textarea id="mission" class="form-control" name="mission" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Vision</label>
                        <textarea id="vision" class="form-control" name="vision" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea id = "description" class="form-control" name="description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="confirmSaveAbout">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
