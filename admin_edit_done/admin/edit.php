<?php
require_once __DIR__ . '/../inc/all.php';
$image_gallery_caller = new ImageGalleryCall($pdo);

$id = $_GET['id'] ?? null;
$image = null;
$edit_error = '';
$edit_success = '';

if ($id !== null) {
    $image = $image_gallery_caller->fetchImageByID($id);
    if (!$image) {
        $edit_error = 'Bild nicht gefunden.';
    }
} else {
    $edit_error = 'Kein Text angegeben.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $alt = $_POST['alt'];

    if ($id && $alt) {
        $image_gallery_caller->updateAltText($id, $alt);
        $edit_success = 'Text aktualisiert.';
        $image = $image_gallery_caller->fetchImageByID($id);  
    } else {
        $edit_error = 'Fehler';
    }
}

require __DIR__ . '/../views/edit.view.php';

