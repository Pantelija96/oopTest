<?php

namespace App\Models;

use App\Exceptions\JuicerException;
use App\Interfaces\Juicable;

abstract class Fruit implements Juicable{
    protected string $color;
    protected float $volume;

    public function __construct(string $color, float $volume)
    {
        if ($volume <= 0) {
            throw new JuicerException('Volume must be greater than 0');
        }

        $this->color = $color;
        $this->volume = $volume;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }

    public function getJuice(): float
    {
        return $this->volume * 0.5;
    }

    public function isUsable(): bool
    {
        return true;
    }

    public function getColor(): string
    {
        return $this->color;
    }
}