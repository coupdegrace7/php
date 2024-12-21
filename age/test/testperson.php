<?php

use PHPUnit\Framework\TestCase;
use App\Models\Person;
use App\Exceptions\AgeOutOfRangeException;

class PersonTest extends TestCase
{
    public function testPersonCreation()
    {
        $person = new Person("John");
        $this->assertEquals("John", $person->getName());
        $this->assertNull($person->getAge());
    }

    public function testSetAndGetAge()
    {
        $person = new Person("John");
        $person->setAge(25);
        $this->assertEquals(25, $person->getAge());
    }

    public function testAgeOutOfRangeException()
    {
        $this->expectException(AgeOutOfRangeException::class);
        $person = new Person("John");
        $person->setAge(200);
    }

    public function testAgeOutOfRangeExceptionNegative()
    {
        $this->expectException(AgeOutOfRangeException::class);
        $person = new Person("John");
        $person->setAge(-5);
    }
}
