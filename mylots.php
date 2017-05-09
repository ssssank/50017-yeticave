<?php

session_start();

require_once 'functions.php';
require_once 'alldata.php';

$myBets = [];

if (!empty($_COOKIE['bets'])) {
    $myBets = json_decode($_COOKIE['bets'], true);
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мои ставки</title>
    <link href="../css/normalize.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<?=makeTemplate('templates/header.php', []); ?>
<?=makeTemplate('templates/main-mylots.php', ['bets' => $myBets, 'lots' => $lots]); ?>
<?=makeTemplate('templates/footer.php', []);  ?>


</body>
</html>