<?php

declare(strict_types=1);

class FileHandler
{
    public function readFile(string $filename): string
    {
        if (!file_exists($filename)) {
            return "Ошибка: Файл '$filename' не найден.";
        }

        $content = file_get_contents($filename);

        if ($content === false) {
            return "Ошибка: Не удалось прочитать файл '$filename'.";
        }

        return $content;
    }
}

$fileHandler = new FileHandler();

$filename = "src/filehandler.txt";

echo $fileHandler->readFile($filename);

