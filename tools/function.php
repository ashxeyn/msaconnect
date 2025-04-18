<?php
function clean_input($input)
{
    $input = trim($input);

    $input = stripslashes($input);

    $input = htmlspecialchars($input);

    $input = strip_tags($input);
    
    return $input;
}

function formatFileSize($size) {
    if ($size >= pow(1024, 3)) {
        return sprintf("%.2f GB", $size / pow(1024, 3));
    } elseif ($size >= pow(1024, 2)) {
        return sprintf("%.2f MB", $size / pow(1024, 2));
    } elseif ($size >= pow(1024, 1)) {
        return sprintf("%.2f KB", $size / pow(1024, 1));
    } else {
        return sprintf("%d bytes", $size);
    }
}

function formatDate($date) {
    return date("F j, Y, g:i a", strtotime($date));
}

function formatDate2($date) {
    return date("F j, Y", strtotime($date));
}


