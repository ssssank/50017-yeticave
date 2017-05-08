<?php

require_once 'functions.php';
require_once 'alldata.php';
require_once 'userdata.php';

$errors = [];
$user = [];

if (isset($_POST)) {
    foreach ($_POST as $field => $value) {
        $user[$field] = htmlspecialchars($value);
        if (empty($value)) {
            $errors[$field] = "Поле должно быть заполнено";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?=makeTemplate('templates/header.php', []); ?>
<?=makeTemplate('templates/main-login.php', ['errors' => $errors, 'user' => $user]); ?>
<?=makeTemplate('templates/footer.php', []);  ?>

</body>
</html>