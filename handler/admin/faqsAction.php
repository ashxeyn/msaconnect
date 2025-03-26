<?php
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();

$action = $_POST['action'] ?? '';
$faqId = $_POST['faq_id'] ?? null;

if ($action === 'edit') {
    $question = clean_input($_POST['question']);
    $answer = clean_input($_POST['answer']);
    $category = clean_input($_POST['category']);

    $result = $adminObj->updateFaq($faqId, $question, $answer, $category);
    echo $result ? "success" : "error";
} elseif ($action === 'delete') {
    $result = $adminObj->deleteFaq($faqId);
    echo $result ? "success" : "error";
} elseif ($action === 'add') {
    $question = clean_input($_POST['question']);
    $answer = clean_input($_POST['answer']);
    $category = clean_input($_POST['category']);

    $result = $adminObj->addFaq($question, $answer, $category);
    echo $result ? "success" : "error";
} else {
    echo "invalid_action";
}
?>
