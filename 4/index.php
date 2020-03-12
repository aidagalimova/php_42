<?php
include 'form.html';
include 'generator.php';
$els = [];

function echoJson($str, &$els)
{
    $arr = explode("\n", $str);
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $arr[$i] = explode(" ", $arr[$i]);
        $sum += (int)$arr[$i][count($arr[$i]) - 1];
    }
    for ($i = 0; $i < count($arr); $i++) {
        $els[$i] = [
            "text" => trim(implode(" ", $arr[$i])),
            "weight" => (int)$arr[$i][count($arr[$i]) - 1],
            "probability" => (int)$arr[$i][count($arr[$i]) - 1] / $sum
        ];
    }
    echo(json_encode(["sum" => $sum,
        "data" => $els],  JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT));
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $str = $_REQUEST["text"];
    echoJson($str, $els);
    echo ("<br><br>");
    generatorCheck($els);
}