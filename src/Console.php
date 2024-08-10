<?php

namespace ConsistentPHP;

class Console extends ConsistentBase {
    public function log(string $message): self {
        echo $this->formatMessage($message) . PHP_EOL;
        return $this;
    }

    public function error(string $message): self {
        fwrite(STDERR, $this->formatMessage("[ERROR] $message") . PHP_EOL);
        return $this;
    }

    public function warn(string $message): self {
        echo $this->formatMessage("[WARNING] $message") . PHP_EOL;
        return $this;
    }

    public function info(string $message): self {
        echo $this->formatMessage("[INFO] $message") . PHP_EOL;
        return $this;
    }

    public function ask(string $question): string {
        $this->log($question);
        return trim(fgets(STDIN));
    }

    public function confirm(string $question): bool {
        $response = $this->ask($question . " (yes/no)");
        return strtolower($response) === 'yes';
    }

    public function progressBar(int $total): self {
        for ($i = 0; $i <= $total; $i++) {
            $this->displayProgress($i, $total);
            usleep(100000); // Simulate work being done
        }
        echo PHP_EOL; // Move to the next line after completion
        return $this;
    }

    private function formatMessage(string $message): string {
        return date('Y-m-d H:i:s') . ' ' . $message;
    }

    private function displayProgress(int $current, int $total): void {
        $percentage = ($current / $total) * 100;
        $bar = str_repeat('=', (int)($percentage / 2)) . str_repeat(' ', 50 - (int)($percentage / 2));
        printf("\r[%s] %.2f%%", $bar, $percentage);
    }
}