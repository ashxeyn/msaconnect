<div class="modal fade" id="addEditPrayerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="prayerModalTitle">Add Schedule</h5>
            </div>
            <div class="modal-body">
                <form id="prayerForm">
                    <input type="hidden" name="prayer_id" id="prayerId">
                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="khutbah_date" id="khutbahDate" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Speaker</label>
                        <input type="text" class="form-control" name="speaker" id="speaker" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Topic</label>
                        <input type="text" class="form-control" name="topic" id="topic" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" id="location" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="confirmSavePrayer">Add Schedule</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
