<?php

declare(strict_types=1);

namespace App\Domain\Animals;

use App\Domain\Animal;

final class Sheep extends Animal
{
    public function doSound(): string
    {
        return 'Sheep: Baa!';
    }
}
