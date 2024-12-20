<?php
use PHPUnit\Framework\TestCase;

require_once 'Game.php';

class GameTest extends TestCase {
    public function testPlayerPoints() {
        $player = new Player("Test Player");
        $player->addPoints(5);
        $this->assertEquals(5, $player->points);
    }

    public function testHedgehogHit() {
        $hedgehog = new Hedgehog(10);
        $damage = $hedgehog->hit();
        $this->assertGreaterThanOrEqual(0, $damage);
        $this->assertLessThanOrEqual(10, $damage);
    }

    public function testGameLeaderboard() {
        $game = new Game(2, 10);
        $game->playRound();
        $leaderboard = $game->getLeaderboard();
        $this->assertCount(2, $leaderboard);
        $this->assertGreaterThanOrEqual($leaderboard[1]->points, $leaderboard[0]->points);
    }
}
