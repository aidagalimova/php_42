<?php
class BrowserLogger extends AbstractLogger
{
    function WriteLogs($text, $format)
    {
       echo(self::DateFormat($format)." ".$text."<br>");
    }
}