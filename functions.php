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

function remainTime($time)
{
    date_default_timezone_set('Europe/Moscow');
    $tomorrow = strtotime($time);
    $now = time();

    $remaining_hours = intval(($tomorrow - $now) / 3600);
    $remaining_minutes = floor((($tomorrow - $now) - (3600 * $remaining_hours)) / 60);
    $time_remaining = "$remaining_hours".":".str_pad($remaining_minutes, 2, '0', STR_PAD_LEFT);

    return $time_remaining;
}

function searchUserByEmail($email, $users)
{
    $result = null;
    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $result = $user;
            break;
        }
    }
    return $result;
}