<?php

session_start();

require_once 'functions.php';

$connection = dbConnection();

$errors = [];
$user = [];
$image = "";

if (!$connection) {
    header('HTTP/1.1 500 Internal Server Error');
    print('Ошибка подключения к базе данных: ' . mysqli_connect_error());
    die();
} else {
    $sql = "SELECT * FROM categories";
    $categories = getData($connection, $sql);

    if (!empty($_POST)) {
        foreach ($_POST as $name => $value) {
            $user[$name] = htmlspecialchars($value);

            if (empty($value)) {
                $errors[$name] = "Поле должно быть заполнено";
                continue;
            }
            if (in_array($name, ['email']) && !filter_var($_POST[$name], FILTER_VALIDATE_EMAIL)) {
                $errors[$name] = 'Некорректный ввод email';
            }
            if (in_array($name, ['email']) && searchUserByEmail($_POST[$name], $connection)) {
                $errors[$name] = "Такой пользователь уже зарегистрирован";
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
        } else {
            $image = 'img/user.jpg';
        }

        if (empty($errors)) {
            $data = [
                $user['email'],
                $user['name'],
                password_hash($user['password'], PASSWORD_DEFAULT),
                $image,
                $user['message']
            ];

            $sql = "INSERT INTO users (reg_date, email, name, password, image, details)
            VALUE (NOW(), ?, ?, ?, ?, ?)";

            $user_id = insertData($connection, $sql, $data);

            if (!empty($user_id)) {
                $user['id'] = $user_id;
                $_SESSION['user'] = $user;
                header("Location: /");
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
    <title>Регистрация</title>
    <link href="../css/normalize.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<?=makeTemplate('templates/header.php', []); ?>
<?=makeTemplate('templates/main-signup.php', ['categories' => $categories, 'user' => $user ,'errors' => $errors]); ?>
<?=makeTemplate('templates/footer.php', ['categories' => $categories]); ?>

</body>
</html>
