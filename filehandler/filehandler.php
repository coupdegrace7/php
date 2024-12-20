<?php

class FileHandler
{
    /**
     * @param string $filename
     * @return string 
     */
    public function readFile($filename)
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

?>

