<?php

session_start();

require_once 'functions.php';

$connection = dbConnection();

$myBets = [];

if (!$connection) {
    header('HTTP/1.1 500 Internal Server Error');
    print('Ошибка подключения к базе данных: ' . mysqli_connect_error());
    die();
} else {
    $sql = "SELECT * FROM categories";
    $categories = getData($connection, $sql);

    $sql = "
    SELECT 
      bets.lot_id,
      bets.create_date,
      bets.user_id,
      bets.price,
      lots.name AS name,
      lots.finish_date,
      lots.image,      
      categories.name AS category      
    FROM bets
      JOIN lots ON lots.id = bets.lot_id
      JOIN categories ON categories.id = lots.category_id 
    WHERE user_id = ?";
    $user_id = $_SESSION['user']['id'];

    $myBets = getData($connection, $sql, [$user_id]);
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
<?=makeTemplate('templates/main-mylots.php', ['bets' => $myBets, 'categories' => $categories]); ?>
<?=makeTemplate('templates/footer.php', ['categories' => $categories]); ?>


</body>
</html>