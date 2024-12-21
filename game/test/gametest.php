<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Game\Src\Game;

class GameTest extends TestCase {
    public function testGameInitialization(): void {
        $game = new Game(3, 10);

        $leaderboard = $game->getLeaderboard();
        $this->assertCount(3, $leaderboard);
        $this->assertSame("Player 1", $leaderboard[0]->name);
        $this->assertSame(0, $leaderboard[0]->points);
    }

    public function testPlayRound(): void {
        $game = new Game(3, 10);
        $game->playRound();

        $leaderboard = $game->getLeaderboard();

        foreach ($leaderboard as $player) {
            $this->assertGreaterThanOrEqual(0, $player->points);
            $this->assertLessThanOrEqual(10, $player->points);
        }
    }

    public function testLeaderboardSorting(): void {
        $game = new Game(3, 10);

        // Simulate points manually
        $game->getLeaderboard()[0]->addPoints(30); // Player 1
        $game->getLeaderboard()[1]->addPoints(20); // Player 2
        $game->getLeaderboard()[2]->addPoints(10); // Player 3

        $leaderboard = $game->getLeaderboard();

        $this->assertSame("Player 1", $leaderboard[0]->name);
        $this->assertSame(30, $leaderboard[0]->points);

        $this->assertSame("Player 2", $leaderboard[1]->name);
        $this->assertSame(20, $leaderboard[1]->points);

        $this->assertSame("Player 3", $leaderboard[2]->name);
        $this->assertSame(10, $leaderboard[2]->points);
    }
}
