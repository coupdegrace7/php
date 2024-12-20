<?php

class Player {
    public $name;
    public $points;

    public function __construct($name) {
        $this->name = $name;
        $this->points = 0;
    }

    public function addPoints($points) {
        $this->points += $points;
    }
}

class Hedgehog {
    public $spikes;

    public function __construct($spikes) {
        $this->spikes = $spikes;
    }

    public function hit() {
        return rand(0, $this->spikes);
    }
}

class Game {
    private $players = [];
    private $hedgehog;

    public function __construct($numPlayers, $spikes) {
        for ($i = 1; $i <= $numPlayers; $i++) {
            $this->players[] = new Player("Player $i");
        }
        $this->hedgehog = new Hedgehog($spikes);
    }

    public function playRound() {
        foreach ($this->players as $player) {
            $damage = $this->hedgehog->hit();
            $player->addPoints($damage);
        }
    }

    public function getLeaderboard() {
        usort($this->players, function($a, $b) {
            return $b->points - $a->points;
        });
        return $this->players;
    }
}
