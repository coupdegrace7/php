<?php

declare(strict_types=1);

namespace Game\Src;

class Hedgehog {
    public int $spikes;

    public function __construct(int $spikes) {
        $this->spikes = $spikes;
    }

    public function hit(): int {
        return random_int(0, $this->spikes);
    }
}
