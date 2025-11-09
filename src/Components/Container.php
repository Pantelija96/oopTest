<?php

namespace App\Components;

use App\Interfaces\FruitContainer as FruitContainerInterface;
use App\Interfaces\Juicable;
use App\Exceptions\JuicerException;

class Container implements FruitContainerInterface
{
    private float $capacity;
    private array $fruits = [];
    private float $currentVolume = 0.0;

    public function __construct(float $capacity)
    {
        if ($capacity <= 0) {
            throw new JuicerException('Container capacity must be greater than 0');
        }
        $this->capacity = $capacity;
    }

    public function addFruit(Juicable $fruit): void
    {
        if (!$fruit->isUsable()) {
            throw new JuicerException('Cannot add rotten fruit to container: ' . $fruit);
        }

        $newVolume = $this->currentVolume + $fruit->getVolume();
        if ($newVolume > $this->capacity) {
            throw new JuicerException(
                "Not enough space in container. Required: {$fruit->getVolume()}L."
            );
        }

        $this->fruits[] = $fruit;
        $this->currentVolume = $newVolume;
    }

    public function getFruitCount(): int
    {
        return count($this->fruits);
    }

    public function getCapacity(): float
    {
        return $this->capacity - $this->currentVolume;
    }

    public function getVolume(): float
    {
        return $this->currentVolume;
    }

    public function getAllFruits(): array
    {
        return $this->fruits;
    }

    public function clear(): void
    {
        $this->fruits = [];
        $this->currentVolume = 0.0;
    }
}
