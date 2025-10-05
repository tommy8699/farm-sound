<?php

declare(strict_types=1);

namespace App\Tests;

use App\App\Farmhouse;
use App\Domain\Herd;
use App\Domain\Animals\Cow;
use App\Domain\Animals\Sheep;
use PHPUnit\Framework\TestCase;

final class FarmSoundTest extends TestCase
{
    public function testSingleAnimalSounds(): void
    {
        $this->assertSame('Cow: Moo!', (new Cow())->doSound());
        $this->assertSame('Sheep: Baa!', (new Sheep())->doSound());
    }

    public function testHerdAggregatesAnimalsAndNestedHerds(): void
    {
        $herdA = new Herd();
        $herdA->addAnimal(new Cow());
        $herdA->addAnimal(new Sheep());

        $herdB = new Herd();
        $herdB->addAnimal(new Cow());

        $mega = new Herd();
        $mega->addAnimal($herdA);
        $mega->addAnimal($herdB);

        $expected = "Cow: Moo!\nSheep: Baa!\nCow: Moo!";
        $this->assertSame($expected, $mega->doSound());
    }

    public function testFarmhouseAggregatesHerds(): void
    {
        $h1 = new Herd();
        $h1->addAnimal(new Cow());

        $h2 = new Herd();
        $h2->addAnimal(new Sheep());
        $h2->addAnimal(new Cow());

        $farm = new Farmhouse();
        $farm->addHerd($h1);
        $farm->addHerd($h2);

        $expected = "Cow: Moo!\nSheep: Baa!\nCow: Moo!";
        $this->assertSame($expected, $farm->doSound());
    }
}
