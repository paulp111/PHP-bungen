<?php
try {
    $dsn = 'mysql:host=localhost;dbname=edvgraz_gallery';
    $user_name = 'edvgraz_gallery';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    $pdo = new PDO($dsn, $user_name, $password, $options);
} catch (PDOException $e) {
    echo 'Datenbank Verbindung gescheitert: ' . $e->getMessage();
}