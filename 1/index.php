<?php
$outputIndex = 0;
$output = [];
$inputIndex = 0;
include 'form.html';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $_REQUEST['text'];
    $input = str_split($_REQUEST['input']);
    for ($j = 0; $j < strlen($code); $j++) {
        switch ($code[$j]) {
            case '>':
                $outputIndex++;
                break;
            case '<':
                $outputIndex--;
                break;
            case '+':
                if(!isset( $output[$outputIndex]))
                {
                    $output[$outputIndex]=0;
                }
                $output[$outputIndex]++;
                break;
            case '-':
                if(!isset( $output[$outputIndex]))
                {
                    $output[$outputIndex]=0;
                }
                $output[$outputIndex]--;
                break;
            case '.':
                echo(chr($output[$outputIndex]));
                break;
            case ',':
                $output[$outputIndex] = ord($input[$inputIndex]);
                $inputIndex++;
                break;
            case '[':
                if ($output[$outputIndex] == 0) {
                    while ($code[$j] != ']') {
                        $j++;
                    }
                }
                break;
            case ']':
                if ($output[$outputIndex] !== 0) {
                    while ($code[$j] != '[') {
                        $j--;
                    }
                }
                break;
        }
    }
}