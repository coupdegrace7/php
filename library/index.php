<?php

require_once 'Library.php';

$library = new Library();

function displayMenu() {
    echo "\nМеню действий:\n";
    echo "1. Добавить книгу\n";
    echo "2. Удалить книгу по названию\n";
    echo "3. Найти книги по автору\n";
    echo "4. Показать все книги\n";
    echo "5. Выйти\n";
    echo "Выберите действие: ";
}

function getInputString($prompt) {
    echo $prompt;
    return trim(fgets(STDIN));
}

function getInputInt($prompt) {
    echo $prompt;
    return (int)trim(fgets(STDIN));
}

while (true) {
    displayMenu();
    $choice = getInputInt("");

    switch ($choice) {
        case 1:
            // добавление книги
            $title = getInputString("Введите название книги: ");
            $author = getInputString("Введите автора книги: ");
            $publishedYear = getInputInt("Введите год публикации книги: ");
            $genre = getInputString("Введите жанр книги: ");
            $library->addBook(new Book($title, $author, $publishedYear, $genre));
            echo "Книга добавлена.\n";
            break;

        case 2:
            // удаление книги по названию
            $title = getInputString("Введите название книги, которую нужно удалить: ");
            $library->removeBookByTitle($title);
            echo "Книга удалена.\n";
            break;

        case 3:
            // поиск книг по автору
            $author = getInputString("Введите автора для поиска книг: ");
            $authorBooks = $library->findBooksByAuthor($author);
            if (count($authorBooks) > 0) {
                echo "Книги автора $author:\n";
                foreach ($authorBooks as $book) {
                    echo $book->getBookInfo() . "\n";
                }
            } else {
                echo "Книги автора $author не найдены.\n";
            }
            break;

        case 4:
            // показать все книги
            $allBooks = $library->listAllBooks();
            if (count($allBooks) > 0) {
                echo "Все книги в библиотеке:\n";
                foreach ($allBooks as $book) {
                    echo $book->getBookInfo() . "\n";
                }
            } else {
                echo "В библиотеке нет книг.\n";
            }
            break;

        case 5:
            echo "Выход из программы.\n";
            exit;

        default:
            echo "Некорректный выбор. Пожалуйста, выберите действие от 1 до 5.\n";
    }
}
?>
