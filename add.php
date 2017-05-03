<?php

require_once 'functions.php';
require_once 'alldata.php';

$lot = [];
$errors = [];

if (isset($_POST)) {
    foreach ($_POST as $name => $value) {
        $lot[$name] = htmlspecialchars($value);
        if (empty($value)) {
            $errors[$name] = "Поле должно быть заполнено";
        }
        if (in_array($name, ['lot-rate', 'lot-step'])) {
            if (!is_numeric($value)) {
                if (empty($errors[$name])) {
                    $errors[$name] = 'Поле должно содержать число';
                }
            } else {
                $lot[$name] = intval($_POST[$name]);
            }
        }
        if (in_array($name, ['lot-date'])) {
            if (!is_numeric(strtotime($value))) {
                $errors[$name] = 'Поле должно содержать дату';

            }
        }
        if (in_array($name, ['category'])) {
            if (($value == "Выберите категорию")) {
                $errors[$name] = 'Категория должна быть выбрана';
            }
        }
    }
}

if (isset($_FILES['lot-img'])) {
    $photo = $_FILES['lot-img'];
    if (is_uploaded_file($photo['tmp_name'])) {
        if ($photo['type'] == 'image/jpeg') {
            move_uploaded_file($photo['tmp_name'], 'img/' . $photo['name']);
            $lot['lot-img'] = 'img/' . $photo['name'];
        } else {
            $errors['lot-img'] = 'Фото должно быть в формате jpeg';
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

<?php if (empty($_POST) or !empty($errors)) : ?>

    <?=makeTemplate('templates/main-add.php', ['errors' => $errors, 'lot' => $lot]); ?>

<?php else : ?>
    <?=makeTemplate('templates/main-new_lot.php', ['bets' => $bets, 'lot' => $lot]); ?>

<?php endif; ?>

<?=makeTemplate('templates/footer.php', []);  ?>

</body>
</html>