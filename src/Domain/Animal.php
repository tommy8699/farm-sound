<?php

declare(strict_types=1);

namespace App\Domain;

interface Soundable
{
    public function doSound(): string;
}

abstract class Animal implements Soundable
{
    abstract public function doSound(): string;
}
