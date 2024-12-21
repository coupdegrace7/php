<?php

declare(strict_types=1);

namespace Animal;

abstract class Animal {
    protected string $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    abstract public function makeSound(): string;

    public function getType(): string {
        return $this->type;
    }

    public function getInfo(): string {
        return "Тип: {$this->getType()}, Звук: {$this->makeSound()}";
    }
}
