<?php

namespace ConsistentPHP;

class Date extends ConsistentBase {
    /**
     * @throws \Exception
     */
    public function __construct(string $dateString = 'now') {
        $this->value = new \DateTime($dateString);
        parent::__construct($this->value);
    }

    public function format(string $format): self {
        $this->value = $this->value->format($format);
        return $this;
    }

    public function addDays(int $days): self {
        $this->value->modify("+{$days} days");
        return $this;
    }

    public function subtractDays(int $days): self {
        $this->value->modify("-{$days} days");
        return $this;
    }

    public function isToday(): bool {
        return $this->value->format('Y-m-d') === (new \DateTime())->format('Y-m-d');
    }

    public function isFuture(): bool {
        return $this->value > new \DateTime();
    }

    public function isPast(): bool {
        return $this->value < new \DateTime();
    }

    public function getTimestamp(): int {
        return $this->value->getTimestamp();
    }

    public function __toString(): string {
        return $this->value->format('Y-m-d H:i:s');
    }
}