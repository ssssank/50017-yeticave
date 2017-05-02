<?php

require_once 'functions.php';
require_once 'alldata.php';
$page404 = false;
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
if (!isset($goods[$id])) {
    $page404 = true;
    header("HTTP/1.1 404 Not Found");
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php (($page404)) ? print ('404') : print ($goods[$_GET['$id']]['name']); ?></title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?=makeTemplate('templates/header.php', []); ?>
<?php if (!($page404)) : ?>
    <?=makeTemplate('templates/main-lot.php', ['bets' => $bets, 'good' => $goods[$id]]); ?>
<?php else : ?>
    <?=makeTemplate('templates/page404.php', []); ?>
<?php endif; ?>
<?=makeTemplate('templates/footer.php', []); ?>

</body>
</html>
