<?php

namespace App\Interfaces;

interface Juicable{
    public function getJuice(): float;
    public function isUsable(): bool;
    public function getVolume(): float;
}