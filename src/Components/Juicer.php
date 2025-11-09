<?php

namespace App\Components;

use App\Models\Apple;
use App\Exceptions\JuicerException;

class Juicer
{
    private Container $container;
    private Strainer $strainer;

    public function __construct(float $containerCapacity)
    {
        $this->container = new Container($containerCapacity);
        $this->strainer = new Strainer();
    }

    public function addApple(): void{

        $volume = mt_rand(10, 50) / 10;
        $isRotten = mt_rand(1, 100) <= 20;
        $colors = ['red', 'green', 'yellow'];

        $apple = new Apple($colors[array_rand($colors)], $volume, $isRotten);

        try {
            $this->container->addFruit($apple);
            echo "Added: $apple to a container,".number_format($this->container->getCapacity(), 2) . "L remaining\n";
        } catch (JuicerException $e) {
            echo "Failed to add apple: " . $e->getMessage() . "\n";
        }
    }

    public function squeeze(): void
    {
        try {
            $juice = $this->strainer->squeeze($this->container);
            echo "Squeezed: " . number_format($juice, 2) . "L of juice.\n";
        } catch (JuicerException $e) {
            echo "Squeeze failed: " . $e->getMessage() . "\n";
        }
    }

    public function getContainer(): Container
    {
        return $this->container;
    }

    public function getStrainer(): Strainer
    {
        return $this->strainer;
    }
}
