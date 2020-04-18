<?php
$ini = parse_ini_file("index.ini", true, INI_SCANNER_NORMAL);

$direction = $ini["second_rule"]["direction"];
if($direction != '+' && $direction != '-') {
    echo("Невалидное значение: $direction Допустимые значения: \"+\", \"-\" <br>");
    return;
}

$delete = $ini["third_rule"]["delete"];
if(strlen($delete) != 1) {
    echo("Невалидное значение: $delete Допустимые значения: 1 любой символ <br>");
    return;
}

$text_file = file($ini["main"]["filename"]);
foreach ($text_file as $value) {
    if ($value[0] == $ini["first_rule"]["symbol"]) {
        if (boolval($ini["first_rule"]["upper"])) {
            $value = strtoupper($value);
        } else {
            $value = strtolower($value);
        }
    } else if ($value[0] == $ini["second_rule"]["symbol"]) {
        $t = $ini["second_rule"]["direction"] == "+" ? 1 : -1;
        for ($i = 0; $i < strlen($value); $i++) {
            if (ctype_digit($value[$i])) {
                $value[$i] = ((int)$value[$i] + $t) % 10;
            }
        }
    } else if ($value[0] == $ini["third_rule"]["symbol"]) {
        $value = str_replace($ini["third_rule"]["delete"], "", $value);
    }
    echo("$value <br>");
}