<?php
// Функции, которые формируют заголовки, нужно вызывать до вывода текста (тела ответа)
// header('Set-Cookie: PHPSESSID=.......');
session_start();

if (!empty($_GET['name'])) {
    $_SESSION['secret_name'] = $_GET['name'];
}

if (!empty($_SESSION['secret_name'])) {
    echo $_SESSION['secret_name'] . '<br />';
}
echo session_save_path();
//session_destroy();
?>

