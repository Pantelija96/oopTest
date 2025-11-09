<?php

namespace App\Components;

use App\Exceptions\JuicerException;

class Strainer
{
    private float $totalJuice = 0.0;

    public function squeeze(Container $container): float
    {
        $fruits = $container->getAllFruits();

        if (empty($fruits)) {
            throw new JuicerException('No fruits in container.');
        }

        $juice = 0.0;

        foreach ($fruits as $fruit) {
            if ($fruit->isUsable()) {
                $juice += $fruit->getJuice();
            }
        }

        $this->totalJuice += $juice;
        $container->clear();

        return $juice;
    }

    public function getTotalJuice(): float
    {
        return $this->totalJuice;
    }

    public function reset(): void
    {
        $this->totalJuice = 0.0;
    }
}
