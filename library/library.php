<?php

require_once 'Book.php';

class Library {
    private array $books = [];

    // метод для добавления книги
    public function addBook(Book $book): void {
        $this->books[] = $book;
    }

    // метод для удаления книги
    public function removeBookByTitle(string $title): void {
        foreach ($this->books as $index => $book) {
            if ($book->getTitle() === $title) {
                unset($this->books[$index]);
                $this->books = array_values($this->books); 
                break;
            }
        }
    }

    // метод для поиска книг
    public function findBooksByAuthor(string $author): array {
        $foundBooks = [];
        foreach ($this->books as $book) {
            if ($book->getAuthor() === $author) {
                $foundBooks[] = $book;
            }
        }
        return $foundBooks;
    }

    // метод для отображения книг
    public function listAllBooks(): array {
        return $this->books;
    }
}
?>
