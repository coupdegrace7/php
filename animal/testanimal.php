<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Animal\Cat;

class CatTest extends TestCase
{
    public function testCatType(): void
    {
        $cat = new Cat();
        $this->assertEquals("Млекопитающее", $cat->getType(), "Cat type should be 'Млекопитающее'");
    }

    public function testCatMakeSound(): void
    {
        $cat = new Cat();
        $this->assertEquals("Мяу", $cat->makeSound(), "Cat sound should be 'Мяу'");
    }

    public function testCatGetInfo(): void
    {
        $cat = new Cat();
        $expectedInfo = "Тип: Млекопитающее, Звук: Мяу";
        $this->assertEquals($expectedInfo, $cat->getInfo(), "Cat info should match the expected format");
    }
}
