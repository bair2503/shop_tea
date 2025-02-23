<?php

/**
 * Постановка:
 * При загрузке файла необходимо определять мета информацию.
 * Для картинок нужно определить ширину и высоту,
 * для аудио и видео - время воспроизведения (длину).
 *
 * На вход мы получаем объект SplFileInfo
 *
 * Задача:
 * В общих чертах описать необходимые для реализации инферфейсы/классы,
 * их свойства и методы. Саму реализацию описывать не обязательно.
 *
 * Описать можно в любом удобном виде
 * (использовать то что ниже не обязательно)
 */

class File
{
    function getMetaInfo(){

    }
}

class ImageFile extends File{
    protected int $width;
    protected int $height;
    public function __construct(SplFileInfo $f){
        $this->width= ...
        $this->height= ...
    }
    function getMetaInfo()
    {
        return "Ширина: ".$this->width.", Высота: ".$this->height;
    }
}
class VideoFile extends File{
    protected int $length;
    public function __construct(SplFileInfo $f){
        $this->length= ...

    }
    function getMetaInfo()
    {
        return "Длина: ".$this->length;
    }
}

class Extractor
{
    /**
     * определяет тип файла, что-то делает
     * @return что-то
     */
    function handle(SplFileInfo $file) {};
}

class UnknownClass implements UnknownInterface
{
    protected $prop = 'здесь что-то хранится, для чего то используется';
}