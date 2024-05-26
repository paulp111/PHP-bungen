<?php

declare(strict_types=1);
include 'functions.php';
include 'header.php';

$error = '';
$max_file_size = 1024 * 1024 * 2; // 2MB
$upload_dir = __DIR__ . '/uploads/';
$allowed_types = ['image/jpeg', 'image/png'];
$allowed_extensions = ['jpg', 'jpeg', 'png'];

function get_file_path(string $filename, string $path): string
{
    $basename = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $basename = preg_replace('/[^a-zA-Z0-9]/', '-', $basename);
    $i = 0;
    while (file_exists($path . $filename)) {
        $i++;
        $filename = $basename . $i . '.' . $extension;
    }
    return __DIR__ . '/uploads/' . $filename;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image'] ?? null;

    if ($image['error'] === 1) {
        $error = 'Image is too big';
    } elseif ($image['error'] === 0) {
        if ($image['size'] > $max_file_size) {
            $error = 'File too large';
        }

        $typ = mime_content_type($image['tmp_name']);
        if (!in_array($typ, $allowed_types, true)) {
            $error = 'File type not allowed';
        }

        $extension = pathinfo(strtolower($image['name']), PATHINFO_EXTENSION);
        if (!in_array($extension, $allowed_extensions, true)) {
            $error = 'File extension not allowed';
        }

        if (!$error) {
            $filename = $image['name'];
            $destination = get_file_path($filename, $upload_dir);
            $moved = scale_and_copy($image['tmp_name'], $destination);
            if (!$moved) {
                $error = 'Error moving file';
            }
        }
    } else {
        $error = 'Sorry, there was an Error: ' . $image['error'];
    }
}
?>
<main>
    <h3>File Upload</h3>
    <form action="form.php" method="POST" enctype="multipart/form-data">
        <label for="image">Upload file:
            <input type="file" name="image" id="image" accept="image/*">
        </label>
        <span style="color: red;"><?php echo e($error); ?></span>
        <input type="submit" value="Upload">
    </form>
    <?php if (isset($moved) && $moved) : ?>
        <p>File uploaded to: <?php echo e($destination); ?></p>
    <?php endif; ?>
</main>
</body>

</html>