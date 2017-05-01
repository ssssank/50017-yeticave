<?php
function makeTemplate($templateFile, $templateData)
{

    if (file_exists($templateFile)) {
        ob_start();
        require_once $templateFile;
        $html = ob_get_clean();
        return $html;
    } else {
        return "";
    }
}

function humanTime($time)
{
    $leftTime = time() - $time;
    $day = 24 * 60 * 60;
    $hour = 60 * 60;

    if ($leftTime < $hour) {
        $time = intval(gmdate("i", $leftTime)) . " минут назад";
    } elseif ($leftTime < $day) {
        $time = gmdate("G", $leftTime) . " часов назад";
    } else {
        $time = gmdate("d.m.y в H:i", $time);
    }

    return $time;
}

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

// записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
$lot_time_remaining = "00:00";

// временная метка для полночи следующего дня
$tomorrow = strtotime('tomorrow midnight');

// временная метка для настоящего времени
$now = time();

// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
$lot_time_remaining_hours = intval(($tomorrow - $now) / 3600);
$lot_time_remaining_minutes = floor((($tomorrow - $now) - (3600 * $lot_time_remaining_hours)) / 60);
$lot_time_remaining = "$lot_time_remaining_hours".":".str_pad($lot_time_remaining_minutes, 2, '0', STR_PAD_LEFT);
