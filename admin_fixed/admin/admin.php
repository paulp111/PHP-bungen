<?php
require_once __DIR__ . '/../inc/all.php';

$images = new ImageGalleryCall($pdo);

renderAdmin(dirname(__DIR__, 1) . '/views/admin.view.php', [
    'images' => $images->fetchAll()
]);
