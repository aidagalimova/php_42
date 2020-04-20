<?php
include 'form.html';
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $month = $_REQUEST["month"];
    get_calendar($month);
}
function get_calendar($month)
{
    if ($month == '') {
        $month = date('m');
    }
    $days_in_month = date('t', mktime(0, 0, 0, $month));
    $date = new DateTime();
    $first_day = new DateTime("{$date->format("y")}-$month-01 00:00:00");
    $step = new DateInterval("P1D");
    $period = new DatePeriod($first_day, $step, $days_in_month-1);
    $arr = [];
    $cur_day = 0;
    $cur_week = 0;
    $arr[-1] = ["ПН", "ВТ", "СР", "ЧТ", "ПТ","СБ", "ВС"];
    foreach ($period as $time) {
        if ($time->format('D') == "Mon") {
            $cur_week++;
            $cur_day = 0;
        }
        $arr[$cur_week][$cur_day] = $time;
        $cur_day++;
    }
    if (count($arr[0]) != 7) {
        $t = array_fill(0, 7 - count($arr[0]), "");
        $arr[0] = array_merge($t, $arr[0]);
    }
    buildCalendar($arr);
}

function buildCalendar($month)
{
    $calendar = "<table>";
    foreach ($month as $week) {
        $calendar = $calendar . "<tr>";
        foreach ($week as $day) {
            if (!is_string($day)) {
                if ($day->format('D') == "Sat" || $day->format('D') == "Sun") {
                    $calendar = $calendar . "<td style='color: red'>{$day->format('d')}</td>";
                } else {
                    $calendar = $calendar . "<td>{$day->format('d')}</td>";
                }
            } else {
                $calendar = $calendar . "<td>{$day}</td>";
            }
        }
        $calendar = $calendar . "</tr>";
    }
    $calendar = $calendar . "</table>";
    echo($calendar);
}