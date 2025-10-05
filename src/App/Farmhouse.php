<?php

declare(strict_types=1);

namespace App\App;

use App\Domain\Herd;
use App\Domain\Soundable;

final class Farmhouse implements Soundable
{
    /** @var list<Herd> */
    private array $herds = [];

    public function addHerd(Herd $herd): void
    {
        $this->herds[] = $herd;
    }

    public function doSound(): string
    {
        $sounds = [];
        foreach ($this->herds as $herd) {
            $sounds[] = $herd->doSound();
        }
        return implode("\n", $sounds);
    }
}
