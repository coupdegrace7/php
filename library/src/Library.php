<?php

namespace LibraryApp;

class Library
{
    private array $books = [];

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function removeBookByTitle(string $title): bool
    {
        foreach ($this->books as $key => $book) {
            if (strcasecmp($book->getTitle(), $title) === 0) {
                unset($this->books[$key]);
                $this->books = array_values($this->books);
                return true;
            }
        }
        return false;
    }

    public function findBooksByAuthor(string $author): array
    {
        return array_filter($this->books, fn($book) => stripos($book->getAuthor(), $author) !== false);
    }

    public function listAllBooks(): array
    {
        return $this->books;
    }
}
