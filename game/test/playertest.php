<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Game\src\Player;

class PlayerTest extends TestCase {
    public function testPlayerInitialization(): void {
        $player = new Player("Player 1");
        $this->assertSame("Player 1", $player->name);
        $this->assertSame(0, $player->points);
    }

    public function testAddPoints(): void {
        $player = new Player("Player 1");
        $player->addPoints(10);
        $this->assertSame(10, $player->points);

        $player->addPoints(5);
        $this->assertSame(15, $player->points);
    }
}
