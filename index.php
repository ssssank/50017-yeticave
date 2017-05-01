<?php

require_once 'functions.php';
require_once 'alldata.php';



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

    <?php
    print makeTemplate('templates/header.php', []);
    print makeTemplate('templates/main-index.php', ['categories' => $categories, 'goods' => $goods, 'lot_time_remaining' => remainToMidnight()]);
    print makeTemplate('templates/footer.php', []);
    ?>

</body>
</html>