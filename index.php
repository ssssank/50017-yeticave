<?php

session_start();

require_once 'functions.php';
require_once 'alldata.php';

$connection = dbConnection();

$sql = "SELECT * FROM categories";
$categories = getData($connection, $sql);

$sql = "SELECT lots.name as name, start_bet, image, finish_date, categories.name as category
FROM lots
  JOIN categories ON categories.id = category_id
WHERE finish_date > NOW()
GROUP BY lots.id
ORDER BY lots.create_date DESC";
$lots = getData($connection, $sql);


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

<?=makeTemplate('templates/header.php', []); ?>
<?=makeTemplate('templates/main-index.php', ['categories' => $categories, 'lot' => $lots]); ?>
<?=makeTemplate('templates/footer.php', ['categories' => $categories]);  ?>

</body>
</html>