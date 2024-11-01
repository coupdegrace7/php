<?php
require __DIR__ . '/vendor/autoload.php';

use LibraryApp\Library;
use LibraryApp\Book;

$library = new Library();

function displayMenu(): void
{
    echo "\n--- Меню действий ---\n";
    echo "1. Добавить книгу\n";
    echo "2. Удалить книгу по названию\n";
    echo "3. Найти книги по автору\n";
    echo "4. Показать все книги\n";
    echo "5. Выйти\n";
    echo "Выберите действие: ";
}

function getInputString(string $prompt): string
{
    echo $prompt;
    $input = trim(fgets(STDIN));
    if ($input === '') {
        echo "Ошибка: Пустой ввод. Пожалуйста, попробуйте снова.\n";
        return getInputString($prompt);
    }
    return $input;
}

function getInputInt(string $prompt): int
{
    echo $prompt;
    $input = trim(fgets(STDIN));
    if (!is_numeric($input)) {
        echo "Ошибка: Введите корректное число.\n";
        return getInputInt($prompt);
    }
    return (int)$input;
}

while (true) {
    displayMenu();
    $choice = getInputInt("");

    switch ($choice) {
        case 1:
            $title = getInputString("Введите название книги: ");
            $author = getInputString("Введите автора книги: ");
            $publishedYear = getInputInt("Введите год публикации книги: ");
            $genre = getInputString("Введите жанр книги: ");
            $library->addBook(new Book($title, $author, $publishedYear, $genre));
            echo "Книга добавлена в библиотеку.\n";
            break;

        case 2:
            $title = getInputString("Введите название книги для удаления: ");
            if ($library->removeBookByTitle($title)) {
                echo "Книга успешно удалена.\n";
            } else {
                echo "Книга с таким названием не найдена.\n";
            }
            break;

        case 3:
            $author = getInputString("Введите автора для поиска книг: ");
            $authorBooks = $library->findBooksByAuthor($author);
            if (count($authorBooks) > 0) {
                echo "Найденные книги автора '$author':\n";
                foreach ($authorBooks as $book) {
                    echo "- " . $book->getBookInfo() . "\n";
                }
            } else {
                echo "Книги автора '$author' не найдены.\n";
            }
            break;

        case 4:
            $allBooks = $library->listAllBooks();
            if (count($allBooks) > 0) {
                echo "Список всех книг в библиотеке:\n";
                foreach ($allBooks as $book) {
                    echo "- " . $book->getBookInfo() . "\n";
                }
            } else {
                echo "Библиотека пуста.\n";
            }
            break;

        case 5:
            echo "Завершение работы программы.\n";
            exit;

        default:
            echo "Некорректный выбор. Пожалуйста, выберите действие от 1 до 5.\n";
    }
}
