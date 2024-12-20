<?php

// Абстрактный класс Animal
abstract class Animal {
    protected $type;

    public function __construct($type) {
        $this->type = $type;
    }

    abstract public function makeSound(): string;

    public function getType(): string {
        return $this->type;
    }

    public function getInfo(): string {
        return "Тип: {$this->getType()}, Звук: {$this->makeSound()}";
    }
}

// Класс Dog
class Dog extends Animal {
    public function __construct() {
        parent::__construct("Млекопитающее");
    }

    public function makeSound(): string {
        return "Гав-гав";
    }
}

// Класс Cat
class Cat extends Animal {
    public function __construct() {
        parent::__construct("Млекопитающее");
    }

    public function makeSound(): string {
        return "Мяу";
    }
}

// Меню действий
function displayMenu() {
    echo "Меню:\n";
    echo "1. Добавить собаку\n";
    echo "2. Добавить кошку\n";
    echo "3. Показать всех животных\n";
    echo "4. Выход\n";
    echo "Выберите действие: ";
}

// Массив животных
$animals = [];

while (true) {
    displayMenu();
    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case "1":
            $animals[] = new Dog();
            echo "Собака добавлена.\n";
            break;
        case "2":
            $animals[] = new Cat();
            echo "Кошка добавлена.\n";
            break;
        case "3":
            if (empty($animals)) {
                echo "Список животных пуст.\n";
            } else {
                foreach ($animals as $animal) {
                    echo $animal->getInfo() . "\n";
                }
            }
            break;
        case "4":
            echo "Выход из программы.\n";
            exit;
        default:
            echo "Некорректный выбор. Попробуйте снова.\n";
    }
}
