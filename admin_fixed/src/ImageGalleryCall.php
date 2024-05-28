<?php


class ImageGalleryCall
{
    private PDO $pdo;
    private string $upload_dir;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->upload_dir = '/uploads/img/';
    }

    public function fetchAll(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM images ORDER BY id');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, Image::class);
    }
    public function handleUpload(string $filename, string $alt, string $tmp_path): void
    {
        $path = get_file_path($filename, $this->upload_dir);
        $final_filename = pathinfo($path, PATHINFO_BASENAME);
        scale_and_copy($tmp_path, $path);
        $stmt = $this->pdo->prepare('INSERT INTO images (file_name, alt) VALUES (:filename, :alt_text)');
        $stmt->execute([
            'filename' => $final_filename,
            'alt_text' => $alt,
        ]);
    }
}


