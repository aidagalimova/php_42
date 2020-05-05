<?php

abstract class AbstractLogger
{
    const TIME = "h-i-s";
    const TIME_DATE = "d-m-Y h:i:s";
    abstract function WriteLogs($text, $format);
    protected function DateFormat($format){
        $now = new DateTime();
        if($format == ""){
            return "";
        }
        return $now->format($format);
    }
}