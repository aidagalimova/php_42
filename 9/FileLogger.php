<?php
class FileLogger extends AbstractLogger
{
    private $fileName;
    private $fd;
    function __construct($fileName)
    {
        $this->fileName=$fileName;
        $this->fd = fopen($fileName, 'w');
    }

    function __destruct()
    {
       fclose($this->fd);
    }

    function WriteLogs($text, $format)
    {
        fwrite($this->fd, self::DateFormat($format)." ".$text."\n");
    }
}