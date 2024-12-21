<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require 'src/FileHandler.php';

class FileHandlerTest extends TestCase
{
    private FileHandler $fileHandler;

    protected function setUp(): void
    {
        $this->fileHandler = new FileHandler();
    }

    public function testReadFileFileNotFound(): void
    {
        $filename = "nonexistent_file.txt";
        $expectedMessage = "Ошибка: Файл '$filename' не найден.";

        $this->assertEquals(
            $expectedMessage,
            $this->fileHandler->readFile($filename)
        );
    }

    public function testReadFileUnreadableFile(): void
    {
        $filename = tempnam(sys_get_temp_dir(), 'test');
        chmod($filename, 0000);

        $expectedMessage = "Ошибка: Не удалось прочитать файл '$filename'.";

        $this->assertEquals(
            $expectedMessage,
            $this->fileHandler->readFile($filename)
        );

        chmod($filename, 0644);
        unlink($filename);
    }

    public function testReadFileSuccess(): void
    {
        $filename = tempnam(sys_get_temp_dir(), 'test');
        $content = "Test content";
        file_put_contents($filename, $content);

        $this->assertEquals(
            $content,
            $this->fileHandler->readFile($filename)
        );

        unlink($filename);
    }
}
