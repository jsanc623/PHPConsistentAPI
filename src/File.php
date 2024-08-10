<?php

namespace ConsistentPHP;

class File extends ConsistentBase {
    public function __construct(string $filePath) {
        if (!file_exists($filePath)) {
            throw new \InvalidArgumentException("File does not exist: $filePath");
        }
        $this->value = $filePath;
        parent::__construct($this->value);
    }

    public function read(): string {
        return file_get_contents($this->value);
    }

    public function write(string $data, bool $append = false): self {
        if ($append) {
            file_put_contents($this->value, $data, FILE_APPEND);
        } else {
            file_put_contents($this->value, $data);
        }
        return $this;
    }

    public function delete(): self {
        if (file_exists($this->value)) {
            unlink($this->value);
        }
        return $this;
    }

    public function exists(): bool {
        return file_exists($this->value);
    }

    public function getSize(): int {
        return filesize($this->value);
    }

    public function getContents(): string {
        return file_get_contents($this->value);
    }

    public function getMimeType(): string {
        return mime_content_type($this->value);
    }

    public function copy(string $destination): self {
        copy($this->value, $destination);
        return $this;
    }

    public function move(string $destination): self {
        rename($this->value, $destination);
        $this->value = $destination; // Update the value to the new path
        return $this;
    }
}