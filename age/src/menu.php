<?php

namespace App;

use App\Models\Person;
use App\Exceptions\AgeOutOfRangeException;

class Menu
{
    private ?Person $person = null;

    public function displayMenu(): void
    {
        while (true) {
            echo "\nМеню:\n";
            echo "1. Создать нового пользователя\n";
            echo "2. Задать возраст пользователя\n";
            echo "3. Показать информацию о пользователе\n";
            echo "4. Выйти\n";
            echo "Выберите действие: ";
            $choice = intval(readline());

            switch ($choice) {
                case 1:
                    $this->createPerson();
                    break;
                case 2:
                    $this->setAge();
                    break;
                case 3:
                    $this->displayPersonInfo();
                    break;
                case 4:
                    echo "Выход из программы.\n";
                    exit;
                default:
                    echo "Неверный выбор. Пожалуйста, выберите снова.\n";
            }
        }
    }

    private function createPerson(): void
    {
        $name = readline("Введите имя: ");
        $this->person = new Person($name);
        echo "Пользователь $name успешно создан.\n";
    }

    private function setAge(): void
    {
        if ($this->person === null) {
            echo "Сначала создайте пользователя.\n";
            return;
        }
        $age = intval(readline("Введите возраст: "));
        try {
            $this->person->setAge($age);
            echo "Возраст установлен: " . $this->person->getAge() . "\n";
        } catch (AgeOutOfRangeException $e) {
            echo "Ошибка: " . $e->getMessage() . "\n";
        }
    }

    private function displayPersonInfo(): void
    {
        if ($this->person === null) {
            echo "Пользователь не создан.\n";
            return;
        }
        echo "Имя пользователя: " . $this->person->getName() . "\n";
        echo "Возраст пользователя: " . ($this->person->getAge() !== null ? $this->person->getAge() : "Не установлен") . "\n";
    }
}
