<?php

declare(strict_types=1);

namespace Game\Src;

class Player {
    public string $name;
    public int $points;

    public function __construct(string $name) {
        $this->name = $name;
        $this->points = 0;
    }

    public function addPoints(int $points): void {
        $this->points += $points;
    }
}
