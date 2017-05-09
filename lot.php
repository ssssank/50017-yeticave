<?php

session_start();

require_once 'functions.php';
require_once 'alldata.php';

$page404 = false;
$readyBet = false;
$errors = [];
$myBets = [];
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!empty($_COOKIE['bets'])) {
    $myBets = json_decode($_COOKIE['bets'], true);
}

if (!empty($_POST['cost'])) {
    if (is_numeric($_POST['cost'])) {
        $myBets[] = ['lot_id' => $id, 'cost' => $_POST['cost'], 'time' => time()];

        $myBets = json_encode($myBets);
        setcookie('bets', $myBets, strtotime("+30 days"), "/");
        header("Location: /mylots.php");
        exit();
    } else {
        $errors['cost'] = "Поле заполнено неправильно";
    }
}

foreach ($myBets as $myBet) {
    if ($id == $myBet['lot_id']) {
        $readyBet = true;
    }
}

if (!isset($lots[$id])) {
    $page404 = true;
    header("HTTP/1.1 404 Not Found");
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $page404 ? '404' : $lots[$id]['lot-name']; ?></title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?=makeTemplate('templates/header.php', []); ?>
<?php if (!($page404)) : ?>
    <?=makeTemplate('templates/main-lot.php', ['bets' => $bets, 'lot' => $lots[$id], 'errors' => $errors, 'readyBet' => $readyBet]); ?>
<?php else : ?>
    <?=makeTemplate('templates/page404.php', []); ?>
<?php endif; ?>
<?=makeTemplate('templates/footer.php', []); ?>

</body>
</html>
