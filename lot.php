<?php

require_once 'functions.php';
require_once 'alldata.php';
$page404 = false;
if (!isset($goods[$_GET['id']])) {
    $page404 = true;
    header("HTTP/1.1 404 Not Found");

} else {
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php (($page404)) ? print ('404') : $goods[$_GET['id']]['name']; ?></title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?=makeTemplate('templates/header.php', []); ?>

<?php
if (!($page404)) {
    print makeTemplate('templates/main-lot.php', ['bets' => $bets, 'good' => $goods[$_GET['id']]]);
} else {
    print makeTemplate('templates/page404.php', []);
}
?>

<?=makeTemplate('templates/footer.php', []); ?>

</body>
</html>
