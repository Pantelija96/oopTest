<?php

use App\Test\Simulation;

require __DIR__ . '/vendor/autoload.php';

$runner = new Simulation(20.0);
$runner->run(100);