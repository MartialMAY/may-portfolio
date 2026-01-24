<?php
namespace App\Services;

class ImageOptimizerService {
    /**
     * Resizes and compresses an image.
     */
    public static function optimize($sourcePath, $destinationPath, $maxWidth = 1200, $maxHeight = 1200, $quality = 80) {
        // Get image info
        $info = getimagesize($sourcePath);
        if (!$info) return false;

        $mime = $info['mime'];
        $width = $info[0];
        $height = $info[1];

        // Only process if it's an image we support
        switch ($mime) {
            case 'image/jpeg':
                $sourceImage = imagecreatefromjpeg($sourcePath);
                break;
            case 'image/png':
                $sourceImage = imagecreatefrompng($sourcePath);
                // Preserve transparency
                imagealphablending($sourceImage, true);
                imagesavealpha($sourceImage, true);
                break;
            case 'image/webp':
                $sourceImage = imagecreatefromwebp($sourcePath);
                break;
            default:
                return false;
        }

        // Calculate new dimensions
        $ratio = $width / $height;
        if ($width > $maxWidth || $height > $maxHeight) {
            if ($width / $maxWidth > $height / $maxHeight) {
                $newWidth = $maxWidth;
                $newHeight = $maxWidth / $ratio;
            } else {
                $newHeight = $maxHeight;
                $newWidth = $maxHeight * $ratio;
            }
        } else {
            $newWidth = $width;
            $newHeight = $height;
        }

        // Create new canvas
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        // Preserve transparency for PNG/WebP
        if ($mime == 'image/png' || $mime == 'image/webp') {
            imagealphablending($newImage, false);
            imagesavealpha($newImage, true);
            $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
            imagefilledrectangle($newImage, 0, 0, $newWidth, $newHeight, $transparent);
        }

        // Resize
        imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        // Output/Save
        $success = false;
        switch ($mime) {
            case 'image/jpeg':
                $success = imagejpeg($newImage, $destinationPath, $quality);
                break;
            case 'image/png':
                // PNG quality is 0-9 (0 = no compression)
                $success = imagepng($newImage, $destinationPath, round(9 * $quality / 100));
                break;
            case 'image/webp':
                $success = imagewebp($newImage, $destinationPath, $quality);
                break;
        }

        // Free memory
        imagedestroy($sourceImage);
        imagedestroy($newImage);

        return $success;
    }
}
