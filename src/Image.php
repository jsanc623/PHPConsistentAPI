<?php

namespace ConsistentPHP;

class Image extends ConsistentBase {
    private \GdImage $imageResource;

    public function __construct(string $filePath) {
        $this->load($filePath);
        parent::__construct($filePath);
    }

    public function load(string $filePath): self {
        $this->imageResource = imagecreatefromstring(file_get_contents($filePath));
        return $this;
    }

    public function save(string $filePath, string $format = 'png', int $quality = 100): self {
        switch ($format) {
            case 'jpeg':
            case 'jpg':
                imagejpeg($this->imageResource, $filePath, $quality);
                break;
            case 'png':
                imagepng($this->imageResource, $filePath);
                break;
            case 'gif':
                imagegif($this->imageResource, $filePath);
                break;
            default:
                throw new \InvalidArgumentException("Unsupported image format: {$format}");
        }
        return $this;
    }

    public function __destruct() {
        if (isset($this->imageResource)) {
            imagedestroy($this->imageResource);
        }
    }
}