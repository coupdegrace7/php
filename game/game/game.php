<?php

declare(strict_types=1);

namespace Game\Src;

use Game\Src\Player;
use Game\Src\Hedgehog;

class Game {
    private array $players = [];
    private Hedgehog $hedgehog;

    public function __construct(int $numPlayers, int $spikes) {
        for ($i = 1; $i <= $numPlayers; $i++) {
            $this->players[] = new Player("Player $i");
        }
        $this->hedgehog = new Hedgehog($spikes);
    }

    public function playRound(): void {
        foreach ($this->players as $player) {
            $damage = $this->hedgehog->hit();
            $player->addPoints($damage);
        }
    }

    public function getLeaderboard(): array {
        usort($this->players, fn(Player $a, Player $b) => $b->points - $a->points);
        return $this->players;
    }
}
