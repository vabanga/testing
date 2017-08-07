<?php
    require_once 'core/core.php';
    if (!isAuthorized()) {
        redirect('login');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Адмника</title>
</head>
<body>
    Добро пожаловать, <?= getCurrentUser()['name'] ?><br/>
    <a href="add_user.php">Добавить нового пользователя</a><br/>
    <a href="testsin.php">перейти к тестам</a><br/>
    <a href="logout.php">Выход</a><br/>
</body>
</html>
