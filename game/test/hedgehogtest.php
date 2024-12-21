<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Game\Src\Hedgehog;

class HedgehogTest extends TestCase {
    public function testHedgehogInitialization(): void {
        $hedgehog = new Hedgehog(10);
        $this->assertSame(10, $hedgehog->spikes);
    }

    public function testHedgehogHit(): void {
        $hedgehog = new Hedgehog(10);
        $hit = $hedgehog->hit();
        $this->assertGreaterThanOrEqual(0, $hit);
        $this->assertLessThanOrEqual(10, $hit);
    }
}
