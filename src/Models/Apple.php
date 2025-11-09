<?php

namespace App\Models;

class Apple extends Fruit
{
    private bool $isRotten;

    public function __construct(string $color, float $volume, bool $isRotten = false)
    {
        parent::__construct($color, $volume);
        $this->isRotten = $isRotten;
    }

    public function isUsable(): bool
    {
        return !$this->isRotten;
    }

    public function isRotten(): bool
    {
        return $this->isRotten;
    }

    public function __toString(): string
    {
        $status = $this->isRotten ? 'rotten' : 'fresh';
        return "Apple({$this->color}, {$this->volume}L, $status)";
    }
}