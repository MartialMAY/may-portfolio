<?php
namespace App\Services;

class UploadService {
    private $targetDir;
    private $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
    private $maxSize = 5 * 1024 * 1024; // 5MB

    public function __construct($subDir = 'uploads') {
        $this->targetDir = __DIR__ . '/../../public/' . $subDir . '/';
        if (!is_dir($this->targetDir)) {
            mkdir($this->targetDir, 0777, true);
        }
    }

    /**
     * Securely upload a file.
     */
    public function upload($file, $customSubDir = '') {
        if (!isset($file) || $file['error'] !== 0) {
            return ['success' => false, 'message' => 'Erreur lors du téléchargement.'];
        }

        // 1. Check size
        if ($file['size'] > $this->maxSize) {
            return ['success' => false, 'message' => 'Le fichier est trop lourd (max 5Mo).'];
        }

        // 2. Real MIME type detection (finfo)
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($file['tmp_name']);

        if (!in_array($mimeType, $this->allowedMimes)) {
            return ['success' => false, 'message' => 'Type de fichier non autorisé (Seuls JPG, PNG, GIF et PDF sont acceptés).'];
        }

        // 3. Generate unique name
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = bin2hex(random_bytes(16)) . '.' . $ext;
        
        $finalDir = $this->targetDir . $customSubDir;
        if (!is_dir($finalDir)) mkdir($finalDir, 0777, true);
        
        $destination = $finalDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            // OPTIMIZATION: If it's an image, optimize it in place
            if (strpos($mimeType, 'image/') === 0 && $mimeType !== 'image/gif') {
                ImageOptimizerService::optimize($destination, $destination);
            }

            // Return relative path for DB
            return [
                'success' => true, 
                'path' => ($customSubDir ? $customSubDir : '') . $filename
            ];
        }

        return ['success' => false, 'message' => 'Erreur lors du déplacement du fichier.'];
    }
}
