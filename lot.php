<?php

session_start();

require_once 'functions.php';
require_once 'alldata.php';
$page404 = false;
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
if (!isset($lot[$id])) {
    $page404 = true;
    header("HTTP/1.1 404 Not Found");
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $page404 ? '404' : $goods[$id]['name']; ?></title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?=makeTemplate('templates/header.php', []); ?>
<?php if (!($page404)) : ?>
    <?=makeTemplate('templates/main-lot.php', ['bets' => $bets, 'lot' => $lot[$id]]); ?>
<?php else : ?>
    <?=makeTemplate('templates/page404.php', []); ?>
<?php endif; ?>
<?=makeTemplate('templates/footer.php', []); ?>

</body>
</html>
