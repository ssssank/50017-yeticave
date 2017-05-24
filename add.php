<?php

session_start();

require_once 'functions.php';

$connection = dbConnection();

$lot = [];
$errors = [];
$lot_name = "";
$category_id = 0;
$description = "";
$start_bet = 0;
$step_bet = 0;
$finish_date = "";
$image = "";
$owner_id = "";

if (!(isset($_SESSION['user']))) {
    header("HTTP/1.1 403 Forbidden");
}

if (!$connection) {
    header('HTTP/1.1 500 Internal Server Error');
    print('Ошибка подключения к базе данных: ' . mysqli_connect_error());
    die();
} else {
    $sql = "SELECT * FROM categories";
    $categories = getData($connection, $sql);

    if (!empty($_POST)) {
        foreach ($_POST as $name => $value) {
            $lot[$name] = htmlspecialchars($value);

            if (empty($value)) {
                $errors[$name] = "Поле должно быть заполнено";
                continue;
            }
            if (in_array($name, ['start_bet', 'step_bet']) && !is_numeric($value)) {
                $errors[$name] = 'Поле должно содержать число';
            }
            if (in_array($name, ['finish_date']) && !is_numeric(strtotime($value)) && strtotime($lot['finish_date']) < time()) {
                $errors[$name] = 'Поле должно содержать корректную дату';
            }
        }

        if (isset($_FILES['image'])) {
            $photo = $_FILES['image'];
            if (is_uploaded_file($photo['tmp_name'])) {
                if ($photo['type'] == 'image/jpeg') {
                    move_uploaded_file($photo['tmp_name'], 'img/' . $photo['name']);
                    $image = 'img/' . $photo['name'];
                } else {
                    $errors['image'] = 'Фото должно быть в формате jpeg';
                }
            }
        }

        if (empty($errors)) {
            $owner_id = $_SESSION['user']['id'];
            $finish_date = date("Y-m-d H:i:s", strtotime($lot['finish_date']));

            $data = [
                $lot['lot_name'],
                $lot['category_id'],
                $lot['description'],
                $lot['start_bet'],
                $lot['step_bet'],
                $finish_date,
                $image,
                $owner_id
            ];

            $sql = "INSERT INTO lots (
              name, 
              category_id,
              description,
              start_bet,
              step_bet,
              finish_date,
              create_date,
              image,
              owner_id
              )
            VALUE (?, ?, ?, ?, ?, ?, NOW(), ?, ?)";

            $lot_id = insertData($connection, $sql, $data);

            if ($lot_id) {
                header("Location: /lot.php?id=" . $lot_id);
                exit();
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление лота</title>
    <link href="../css/normalize.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<?=makeTemplate('templates/header.php', []); ?>

<?php if (!(isset($_SESSION['user']))) : ?>

    <?=makeTemplate('templates/page403.php', []); ?>

<?php elseif (empty($_POST) or !empty($errors)) : ?>

    <?=makeTemplate('templates/main-add.php', ['errors' => $errors, 'lot' => $lot, 'categories' => $categories]); ?>


<?php else : ?>
    <?=makeTemplate('templates/main-lot.php', ['lot' => $lot, 'lot_id' => $lot_id]); ?>

<?php endif; ?>

<?=makeTemplate('templates/footer.php', ['categories' => $categories]); ?>

</body>
</html>