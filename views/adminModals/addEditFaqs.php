<?php
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();

$faqId = $_GET['faq_id'] ?? null;
$faq = null;
?>

<div class="modal fade" id="addEditFaqModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="faqModalTitle">
                    <?= $faq ? 'Edit FAQ' : 'Add FAQ' ?>
                </h5>
            </div>
            <div class="modal-body">
                <form id="faqForm">
                    <input type="hidden" id="faqId" name="faqId" value="<?= $faq ? $faq['faq_id'] : '' ?>">
                    
                    <div class="mb-3">
                        <label for="faqQuestion" class="form-label">Question</label>
                        <input type="text" class="form-control" id="question" name="question" 
                               value="<?= $faq ? clean_input($faq['question']) : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="faqAnswer" class="form-label">Answer</label>
                        <textarea class="form-control" id="answer" name="answer" rows="3" required><?= $faq ? clean_input($faq['answer']) : '' ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="faqCategory" class="form-label">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="General Questions" <?= ($faq && $faq['category'] == 'General Questions') ? 'selected' : '' ?>>General Questions</option>
                            <option value="Events and Activities" <?= ($faq && $faq['category'] == 'Events and Activities') ? 'selected' : '' ?>>Events and Activities</option>
                            <option value="Donation and Support" <?= ($faq && $faq['category'] == 'Donation and Support') ? 'selected' : '' ?>>Donation and Support</option>
                            <option value="Contact and Support" <?= ($faq && $faq['category'] == 'Contact and Support') ? 'selected' : '' ?>>Contact and Support</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="confirmSaveFaq">
                            <?= $faq ? 'Update FAQ' : 'Add FAQ' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
