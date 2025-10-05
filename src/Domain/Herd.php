<?php

declare(strict_types=1);

namespace App\Domain;

final class Herd implements Soundable
{
    /** @var list<Animal|Herd> */
    private array $animals = [];

    public function addAnimal(Animal|Herd $animal): void
    {
        $this->animals[] = $animal;
    }

    public function doSound(): string
    {
        $sounds = [];
        foreach ($this->animals as $item) {
            $sounds[] = $item->doSound();
        }
        return implode("\n", $sounds);
    }
}
