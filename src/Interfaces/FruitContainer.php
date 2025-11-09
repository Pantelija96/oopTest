<?php

namespace App\Interfaces;

use App\Interfaces\Juicable;

interface FruitContainer{
    public function addFruit(Juicable $fruit);
    public function getFruitCount(): int;
    public function getCapacity(): float;
    public function getVolume(): float;
    public function getAllFruits(): array;
    public function clear();
}