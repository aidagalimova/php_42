<?php
function randomString($els)
{
    usort($els, function ($a, $b) {
        return $a["probability"] > $b["probability"];
    });

    for ($i = 0; $i < count($els); $i++) {
        if ($i == 0)
            continue;
        $els[$i]["probability"] += $els[$i - 1]["probability"];
    }

    while (true) {
        $rnd = lcg_value();
        for ($i = 0; $i < count($els); $i++) {
            if ($i == 0 && $rnd <= $els[$i]["probability"]) {
                yield $els[$i]["text"];
                break;
            }
            if ($i != 0 && $rnd > $els[$i - 1]["probability"] && $rnd <= $els[$i]["probability"]) {
                yield $els[$i]["text"];
                break;
            }
        }
    }
}

function generatorCheck(&$els)
{
    $arr = [];
    $i = 0;
    foreach (randomString($els) as $item) {
        if (array_key_exists($item, $arr)) {
            $arr[$item]++;
        } else {
            $arr[$item] = 1;
        }
        $i++;
        if ($i == 10000) {
            break;
        }
    }
    $res = [];
    $sum = 0;

    foreach ($arr as $v)
    {
        $sum+=$v;
    }
    for ($i = 0; $i < count($arr); $i++) {
        $key = key($arr);
        $k = explode(" ", $key);
        $res[$i] = [
            "text" => $key,
            "count" => $arr[$key],
            "calculated_probability" => $arr[$key] / $sum
        ];
        next($arr);
    }
    echo(json_encode($res, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT));
}