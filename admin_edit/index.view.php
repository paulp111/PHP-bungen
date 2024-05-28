<section class="gallery grid">
    <?php if (isset($images)): ?>
        <?php foreach ($images as $image): ?>
            <div class="gallery-item">
                <img src="<?= e($image->getSRC()) ?>" alt="<?= e($image->alt) ?>">
                <p><?= e($image->alt) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Es wurden bis jetzt noch keine Bilder erfasst.</p>
    <?php endif; ?>
</section>