<?php

namespace App\Test;

use App\Components\Juicer;

class Simulation
{
    private Juicer $juicer;
    private int $squeezeCount = 0;

    public function __construct(float $containerCapacity)
    {
        $this->juicer = new Juicer($containerCapacity);
    }

    public function run(int $totalActions = 100): void
    {
        echo "Simulation start\n\n";

        for ($action = 1; $action <= $totalActions; $action++) {
            echo "Action $action: ";

            $this->juicer->squeeze();
            $this->squeezeCount++;

            if ($this->squeezeCount % 9 === 0) {
                $this->juicer->addApple();
            }
        }

        $this->printFinalStatistics();
    }

    private function printFinalStatistics(): void
    {
        echo "\n-------------------\n";
        echo "\nSimulation complete\n";
        echo "Final Statistics:\n";
        echo "- Total juice : " . number_format($this->juicer->getStrainer()->getTotalJuice(), 2) . "L\n";
        echo "- Fruits remaining: " . $this->juicer->getContainer()->getFruitCount() . "\n";
        echo "- Container volume used: " . number_format($this->juicer->getContainer()->getVolume(), 2) . "L\n";
    }
}
