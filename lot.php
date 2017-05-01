<?php

require_once 'function.php';

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

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
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>DC Ply Mens 2016/2017 Snowboard</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?php
print makeTemplate('templates/header.php', []);
print makeTemplate('templates/main-lot.php', ['bets' => $bets]);
print makeTemplate('templates/footer.php', []);
?>

</body>
</html>
