<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/pico.css" />
    <link rel="stylesheet" href="/css/pico.classless.min.css" />
    <title>Text bearbeiten</title>
</head>
<body>
    <header>
        <h1>Text bearbeiten</h1>
    </header>
    <main class="grid">
        <?php if ($edit_error): ?>
            <p style="color: red;"><?= e($edit_error) ?></p>
        <?php endif; ?>

        <?php if ($edit_success): ?>
            <p style="color: green;"><?= e($edit_success) ?></p>
        <?php endif; ?>

        <?php if ($image): ?>
            <form action="edit.php?id=<?= e($image->id) ?>" method="POST">
                <input type="hidden" name="id" value="<?= e($image->id) ?>">
                <label for="alt">Text bearbeiten</label>
                <input type="text" name="alt" id="alt" value="<?= e($image->alt) ?>">
                <input type="submit" value="speichern">
            </form>
        <?php endif; ?>

        <a href="admin.php" class="button">Zurück</a>
    </main>
    <footer>
        <p>|edvgraz|</p>
    </footer>
</body>
</html>
