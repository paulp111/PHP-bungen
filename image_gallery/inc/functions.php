<?php

function e($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
}

function render($path, array $data = []): void
{
    ob_start();
    extract($data);
    require $path;
    $content = ob_get_clean();
    ob_end_clean();
    require __DIR__ . '/../views/layouts/main.view.php';
}
