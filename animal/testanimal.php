<?php
use PHPUnit\Framework\TestCase;

require_once 'C:/mrmt/dddddd/php/unit/src/animal.php';

class AnimalTest extends TestCase {
    public function testDogSound() {
        $dog = new Dog();
        $this->assertEquals("Гав-гав", $dog->makeSound());
        $this->assertEquals("Млекопитающее", $dog->getType());
        $this->assertEquals("Тип: Млекопитающее, Звук: Гав-гав", $dog->getInfo());
    }

    public function testCatSound() {
        $cat = new Cat();
        $this->assertEquals("Мяу", $cat->makeSound());
        $this->assertEquals("Млекопитающее", $cat->getType());
        $this->assertEquals("Тип: Млекопитающее, Звук: Мяу", $cat->getInfo());
    }
}
