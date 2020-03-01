<?php
include 'form.html';
function transformString($string)
{
    $transformedString = "";
    $replacementCount = 0;
    function transformSomeChar(string $str, &$replacementCount)
    {
        for ($i = 0; $i < strlen($str); $i++) {
            switch ($str[$i]) {
                case "h":
                    $replacementCount++;
                    yield "4";
                    break;
                case "e":
                    $replacementCount++;
                    yield "3";
                    break;
                case "l":
                    $replacementCount++;
                    yield "2";
                    break;
                case "o":
                    $replacementCount++;
                    yield "0";
                    break;
                default:
                    yield $str[$i];
            }
        }
    }
    foreach (transformSomeChar($string, $replacementCount) as $char)
    {
      $transformedString = $transformedString.$char;
    }
    return "$transformedString \n ReplacementCount: $replacementCount";
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $string = $_REQUEST["text"];
    echo(transformString($string));
}
