<?php

declare(strict_types=1);

use Animal\Dog;
use Animal\Cat;

include 'vendor/autoload.php';

function displayMenu(): void {
    echo "Меню:\n";
    echo "1. Добавить собаку\n";
    echo "2. Добавить кошку\n";
    echo "3. Показать всех животных\n";
    echo "4. Выход\n";
    echo "Выберите действие: ";
}

function main(): void {
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
}

main();
