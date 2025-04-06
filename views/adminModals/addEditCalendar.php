<div class="modal fade" id="addEditCalendarModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="calendarModalTitle" class="modal-title">Add Activity</h5>
            </div>
            <div class="modal-body">
                <form id="calendarForm">
                    <input type="hidden" id="activityId" name="activity_id">

                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="activity_date" id="activityDate" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Activity</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="confirmSaveActivity">Add Activity</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
