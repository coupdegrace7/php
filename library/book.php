<?php

class Book {
    private string $title;
    private string $author;
    private int $publishedYear;
    private string $genre;

    // конструктор
    public function __construct(string $title, string $author, int $publishedYear, string $genre) {
        $this->title = $title;
        $this->author = $author;
        $this->publishedYear = $publishedYear;
        $this->genre = $genre;
    }

    // геттеры
    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getPublishedYear(): int {
        return $this->publishedYear;
    }

    public function getGenre(): string {
        return $this->genre;
    }

    // сеттеры
    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function setAuthor(string $author): void {
        $this->author = $author;
    }

    public function setPublishedYear(int $publishedYear): void {
        $this->publishedYear = $publishedYear;
    }

    public function setGenre(string $genre): void {
        $this->genre = $genre;
    }

    // метод для получения информации о книге
    public function getBookInfo(): string {
        return "Название: {$this->title}, Автор: {$this->author}, Год публикации: {$this->publishedYear}, Жанр: {$this->genre}";
    }
}
?>
