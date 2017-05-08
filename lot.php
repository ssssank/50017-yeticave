<?php

session_start();

require_once 'functions.php';
require_once 'alldata.php';

$page404 = false;
$myBets = [];
$errors = [];

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (isset($_POST['cost'])) {
    if (!empty($_POST['cost'])) {
        if (is_numeric($_POST['cost'])) {
            $myBets[] = ['id' => $id, 'cost' => $_POST['cost'], 'time' => time()];

            $myBets = json_encode($myBets);
            setcookie('bets', $myBets, strtotime("+30 days"), "/");
            header("Location: /mylots.php");
            exit();
        } else {
            $errors['cost'] = "Поле заполнено неправильно";
        }
    } else {
        $errors['cost'] = "Поле не заполнено";
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
    <?=makeTemplate('templates/main-lot.php', ['bets' => $bets, 'lot' => $lots[$id], 'errors' => $errors]); ?>
<?php else : ?>
    <?=makeTemplate('templates/page404.php', []); ?>
<?php endif; ?>
<?=makeTemplate('templates/footer.php', []); ?>

</body>
</html>
