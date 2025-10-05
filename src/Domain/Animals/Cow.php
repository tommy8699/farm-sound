<?php

declare(strict_types=1);

namespace App\Domain\Animals;

use App\Domain\Animal;

final class Cow extends Animal
{
    public function doSound(): string
    {
        return 'Cow: Moo!';
    }
}
