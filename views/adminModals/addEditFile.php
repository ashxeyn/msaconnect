<div class="modal fade" id="addEditFileModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalTitle">Add File</h5>
            </div>
            <div class="modal-body">
                <!-- Error container -->
                <div id="fileErrorContainer" class="alert alert-danger" style="display: none;"></div>
                
                <form id="fileForm">
                    <input type="hidden" id="fileId" name="fileId">
                    <div class="mb-3">
                        <label for="file_name" class="form-label">File Name</label>
                        <input type="text" class="form-control" id="file_name" name="file_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf,.docx" required>
                        <small class="text-muted">Only PDF and DOCX files are accepted.</small>
                        <div id="current-file-info" class="mt-2" style="display: none;">
                            <p><strong>Current file:</strong> <span id="current-file-name"></span></p>
                            <p><strong>Type:</strong> <span id="current-file-type"></span></p>
                            <p><strong>Size:</strong> <span id="current-file-size"></span></p>
                            <small class="text-muted">Upload a new file only if you want to replace the current one.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="confirmSaveFile">Add File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>