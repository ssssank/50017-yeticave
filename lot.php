<?php

require_once 'functions.php';
require_once 'alldata.php';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?=$goods[$_GET['id']]['name'] ; ?></title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?php

if (!isset($goods[$_GET['id']])) {
    header("HTTP/1.1 404 Not Found");
} else {
    print makeTemplate('templates/header.php', []);
    print makeTemplate('templates/main-lot.php', ['bets' => $bets, 'good' => $goods[$_GET['id']]]);
    print makeTemplate('templates/footer.php', []);
}
?>

</body>
</html>
