<?php

include 'mysql_helper.php';

function makeTemplate($templateFile, $templateData = [])
{
    extract($templateData);
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
    $leftTime = time() - strtotime($time);
    $day = 24 * 60 * 60;
    $hour = 60 * 60;

    if ($leftTime < $hour) {
        $time = intval(gmdate("i", $leftTime)) . " минут назад";
    } elseif ($leftTime < $day) {
        $time = gmdate("G", $leftTime) . " часов назад";
    } else {
        $time = gmdate("d.m.y в H:i", strtotime($time));
    }

    return $time;
}

function remainTime($time)
{
    date_default_timezone_set('Europe/Moscow');

    $leftTime = strtotime($time) - time();
    $remaining_days = floor($leftTime / 86400);

    $leftTime -= $remaining_days * 86400;
    $remaining_hours = floor($leftTime / 3600);

    $leftTime -= $remaining_hours * 3600;
    $remaining_minutes = floor($leftTime / 60);

    $time_remaining = "$remaining_days" . "дн " . "$remaining_hours".":".str_pad($remaining_minutes, 2, '0', STR_PAD_LEFT);

    return $time_remaining;
}

function searchUserByEmail($email, $connection)
{
    $sql = "SELECT id, name, email, password, image FROM users WHERE email = ? LIMIT 1";
    $users = getData($connection, $sql, [$email]);
    $result = null;

    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $result = $user;
            break;
        }
    }
    return $result;
}

function dbConnection()
{
    $connection = mysqli_connect("localhost", "root", "", "yeticave");
    return $connection;
}

function getData($connection, $sql, $sqlData = [])
{
    $resultData = [];

    $stmt = db_get_prepare_stmt($connection, $sql, $sqlData);

    if ($stmt) {
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result(($stmt));
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultData[] = $row;
            }
        }
        mysqli_stmt_close($stmt);
    }

    return $resultData;
}

function insertData($connection, $sql, $sqlData)
{
    $result = false;

    $stmt = db_get_prepare_stmt($connection, $sql, $sqlData);

    if ($stmt) {
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_insert_id($stmt);
        }
        mysqli_stmt_close($stmt);
    }

    return $result;
}

function updateData($connection, $tableName, $sqlData, $arrayWhere)
{
    $result = false;
    $fieldsForUpdate = [];
    $dataForUpdate = [];
    $where = [];
    $sql = "UPDATE " .$tableName. " SET ";

    foreach ($sqlData as $key => $value) {
        $fieldsForUpdate[] = $key."=?";
        $dataForUpdate[] = $value;
    }

    $sql .= implode(', ', $fieldsForUpdate);
    $sql .= " WHERE ";

    foreach ($arrayWhere as $key => $value) {
        $where[] = $key."=?";
        $dataForUpdate[] = $value;
    }

    $sql .= implode(' AND ', $where);
    $sql .= ";";

    $stmt = db_get_prepare_stmt($connection, $sql, $dataForUpdate);

    if ($stmt) {
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_affected_rows($stmt);
        }
        mysqli_stmt_close($stmt);
    }

    return $result;
}
