<?php
include 'form.html';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $arr = explode("\n", $_REQUEST['text']);
    for ($i = 0; $i < count($arr); $i++) {
        $arr[$i] = explode(" ", $arr[$i]);
    }
    $arr2 = $arr;
    for ($i = 0; $i < count($arr2); $i++) {
        shuffle($arr2[$i]);
    }
    $arr = array_merge($arr, $arr2);
    usort($arr, function ($a, $b) {
        return $a[1] > $b[1];
    });
    for ($i = 0; $i < count($arr); $i++) {
        $arr[$i] = implode(" ", $arr[$i]);
    }
    echo(implode("<br>", $arr));
}
