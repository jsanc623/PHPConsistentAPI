<?php

namespace ConsistentPHP;

class Mail extends ConsistentBase {
    public function send(string $to, string $subject, string $message, array $headers = []): bool {
        $headersString = implode("\r\n", $headers);
        return mail($to, $subject, $message, $headersString);
    }

    public function validateEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}