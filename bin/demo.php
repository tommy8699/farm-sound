<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\App\Farmhouse;
use App\Domain\Herd;
use App\Domain\Animals\Cow;
use App\Domain\Animals\Sheep;

$herdA = new Herd();
$herdA->addAnimal(new Cow());
$herdA->addAnimal(new Sheep());

$herdB = new Herd();
$herdB->addAnimal(new Cow());

$mega = new Herd();
$mega->addAnimal($herdA);
$mega->addAnimal($herdB);

$farm = new Farmhouse();
$farm->addHerd($mega);

echo $farm->doSound(), PHP_EOL;
