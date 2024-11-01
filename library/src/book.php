<?php

namespace LibraryApp;

class book
{
    private string $title;
    private string $author;
    private int $publishedYear;
    private string $genre;

    public function __construct(string $title, string $author, int $publishedYear, string $genre)
    {
        $this->title = $title;
        $this->author = $author;
        $this->publishedYear = $publishedYear;
        $this->genre = $genre;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getBookInfo(): string
    {
        return "«{$this->title}» — автор: {$this->author}, год публикации: {$this->publishedYear}, жанр: {$this->genre}";
    }
}
