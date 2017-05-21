<?php

session_start();

require_once 'functions.php';

$connection = dbConnection();

$page404 = false;
$readyBet = false;
$errors = [];
$myBets = [];
$lot = [];
$lot_id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$connection) {
    header('HTTP/1.1 500 Internal Server Error');
    print('Ошибка подключения к базе данных: ' . mysqli_connect_error());
    die();
} else {
    $sql = "SELECT * FROM categories";
    $categories = getData($connection, $sql);

    $sql = "
    SELECT 
      lots.id AS id, 
      lots.name AS name, 
      description, 
      start_bet,
      step_bet,
      finish_date,
      image, 
      categories.name AS category
    FROM lots
      JOIN categories ON categories.id = lots.category_id
    WHERE lots.id = ?";
    $lot = getData($connection, $sql, [$lot_id]);

    $sql = "
    SELECT 
      users.name AS name,
      users.id AS user_id,
      price,
      create_date
    FROM bets 
    JOIN users ON bets.user_id = users.id
    WHERE lot_id = ?
    ORDER BY price DESC";
    $bets = getData($connection, $sql, [$lot_id]);

    if ($bets) {
        $price = $bets[0]['price'];
    } else {
        $price = $lot[0]['start_bet'];
    }

    if (!empty($_SESSION['user'])) {
        $user_id = $_SESSION['user']['id'];

        if (!empty($_POST['cost']) && filter_var($_POST['cost'], FILTER_VALIDATE_INT)) {
            $bet = ['cost' => $_POST['cost'], 'user_id' => $user_id, 'lot_id' => $lot_id];

            $sql = "INSERT INTO bets (`create_date`, `price`, `user_id`, `lot_id`) VALUES (NOW(), ?, ?, ?);";
            insertData($connection, $sql, $bet);

            header("Location: /mylots.php");
            exit();
        }
    }

    if (!$lot) {
        $page404 = true;
        header("HTTP/1.1 404 Not Found");
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $page404 ? '404' : $lot[0]['name']; ?></title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?=makeTemplate('templates/header.php', []); ?>
<?php if (!($page404)) : ?>
    <?=makeTemplate('templates/main-lot.php', [
        'categories' => $categories,
        'bets' => $bets,
        'lot' => $lot,
        'errors' => $errors,
        'price' => $price,
        'readyBet' => $readyBet]); ?>
<?php else : ?>
    <?=makeTemplate('templates/page404.php', []); ?>
<?php endif; ?>
<?=makeTemplate('templates/footer.php', ['categories' => $categories]); ?>

</body>
</html>
