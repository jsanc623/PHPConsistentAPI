<?php

namespace ConsistentPHP;

class CSV extends ConsistentBase {
    public function load(string $filename): self {
        if (!file_exists($filename) || !is_readable($filename)) {
            throw new \Exception("File not found or is not readable.");
        }

        $this->value = [];
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                $this->value[] = $data;
            }
            fclose($handle);
        }
        return $this;
    }

    public function save(string $filename, array $data = null, string $delimiter = ','): self {
        $data = $data ?? $this->value;
        if (($handle = fopen($filename, 'w')) !== false) {
            foreach ($data as $row) {
                fputcsv($handle, $row, $delimiter);
            }
            fclose($handle);
        }
        return $this;
    }

    public function getRows(): array {
        return $this->value;
    }

    public function getRow(int $index): array {
        return $this->value[$index] ?? [];
    }

    public function addRow(array $row): self {
        $this->value[] = $row;
        return $this;
    }

    public function removeRow(int $index): self {
        if (isset($this->value[$index])) {
            unset($this->value[$index]);
            $this->value = array_values($this->value); // Re-index the array
        }
        return $this;
    }

    public function clear(): self {
        $this->value = [];
        return $this;
    }
}