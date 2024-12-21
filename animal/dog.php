<?php

declare(strict_types=1);

namespace Animal;

class Dog extends Animal {
    public function __construct() {
        parent::__construct("Млекопитающее");
    }

    public function makeSound(): string {
        return "Гав-гав";
    }
}
