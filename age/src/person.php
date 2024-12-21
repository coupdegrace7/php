<?php

namespace App\Models;

use App\Exceptions\AgeOutOfRangeException;

class Person
{
    private string $name;
    private ?int $age = null;

    public function __construct(string $name, ?int $age = null)
    {
        $this->name = $name;
        if ($age !== null) {
            $this->setAge($age);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        if ($age < 0 || $age > 150) {
            throw new AgeOutOfRangeException("Возраст должен быть в диапазоне от 0 до 150.");
        }
        $this->age = $age;
    }
}
