<?php

session_start();

require_once 'functions.php';
require_once 'alldata.php';

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
<?=makeTemplate('templates/main-mylots.php', []); ?>
<?=makeTemplate('templates/footer.php', []);  ?>


</body>
</html>