<?php

use PHPUnit\Framework\TestCase;
use App\Menu;
use App\Models\Person;
use App\Exceptions\AgeOutOfRangeException;

class MenuTest extends TestCase
{
    public function testCreatePerson()
    {
        $menu = new Menu();

        $reflection = new ReflectionClass($menu);
        $method = $reflection->getMethod('createPerson');
        $method->setAccessible(true);

        $name = "John";
        $this->expectOutputRegex("/Введите имя: .*\nПользователь $name успешно создан\.\n/");
        $this->simulateReadline($name);

        $method->invoke($menu);

        $personProperty = $reflection->getProperty('person');
        $personProperty->setAccessible(true);
        $person = $personProperty->getValue($menu);

        $this->assertInstanceOf(Person::class, $person);
        $this->assertEquals("John", $person->getName());
    }

    public function testSetAgeValid()
    {
        $menu = new Menu();

        $reflection = new ReflectionClass($menu);
        $createPersonMethod = $reflection->getMethod('createPerson');
        $createPersonMethod->setAccessible(true);

        $createPersonMethod->invoke($menu);

        $setAgeMethod = $reflection->getMethod('setAge');
        $setAgeMethod->setAccessible(true);

        $this->simulateReadline("25");
        $this->expectOutputRegex("/Введите возраст: .*\nВозраст установлен: 25\n/");
        $setAgeMethod->invoke($menu);

        $personProperty = $reflection->getProperty('person');
        $personProperty->setAccessible(true);
        $person = $personProperty->getValue($menu);

        $this->assertEquals(25, $person->getAge());
    }

    public function testSetAgeInvalid()
    {
        $menu = new Menu();

        $reflection = new ReflectionClass($menu);
        $createPersonMethod = $reflection->getMethod('createPerson');
        $createPersonMethod->setAccessible(true);

        $createPersonMethod->invoke($menu);

        $setAgeMethod = $reflection->getMethod('setAge');
        $setAgeMethod->setAccessible(true);

        $this->simulateReadline("200");
        $this->expectOutputRegex("/Введите возраст: .*\nОшибка: Возраст должен быть в диапазоне от 0 до 150\.\n/");
        $setAgeMethod->invoke($menu);
    }

    private function simulateReadline($input)
    {
        global $readlineOutput;
        $readlineOutput = $input;
    }
}
