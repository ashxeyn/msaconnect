<div class="modal fade" id="addEditEventModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalTitle">Add Event</h5>
            </div>
            <div class="modal-body">
                <form id="eventForm">
                    <input type="hidden" id="eventId" name="eventId">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <div id="image-preview" style="display: none;">
                            <img id="preview-img" src="" alt="Current Image" class="img-thumbnail mt-2" width="100">
                        </div>
                    </div>
                    <div>
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="confirmSaveEvent">Add Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
