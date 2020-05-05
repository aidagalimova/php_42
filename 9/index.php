<?php
include "form.html";
include "AbstractLogger.php";
include "BrowserLogger.php";
include "FileLogger.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = $_REQUEST['text'];
    $log = $_REQUEST['log'];
    $format = $_REQUEST['format'];
    $file = $_REQUEST['file'];
    if ($format == 'time') {
        $format = AbstractLogger::TIME;
    } else if ($format == 'time_date') {
        $format = AbstractLogger::TIME_DATE;
    } else {
        $format = "";
    }

    if ($log == 'browser') {
        WriteLogs(new BrowserLogger(), $format, $text);
    } else {
        WriteLogs(new FileLogger($file), $format, $text);
    }
}

function WriteLogs(AbstractLogger $logger, $format, $text)
{
    $strs = explode("\n", $text);
    foreach ($strs as $str) {
        $is_contain = false;
        for($i = 0; $i< mb_strlen($str); $i++) {
            if (ctype_upper($str[$i])) {
                $is_contain = true;
                break;
            }
        }
        if ($is_contain) {
            $logger -> WriteLogs("Строка $str содержит заглавные буквы", $format);
        } else {
            $logger -> WriteLogs("Строка $str не содержит заглавные буквы", $format);
        }
    }
}