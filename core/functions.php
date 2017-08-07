<?php
define('FILE_USER_DATA', __DIR__ . '/../data/users.json');

/**
 * Выполняет механизм аутоидентификации
 * @param $login
 * @param $password
 * @return bool
 */
function login($login, $password)
{
    $user = getUser($login);
    if ($user && $user['password'] == $password) {
        unset($user['password']);
        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}

/**
 * Проверяет авторизован ли пользователь
 * @return bool
 */
function isAuthorized()
{
    return !empty($_SESSION['user']);
}

/**
 * Получаем текущего авторизованного пользователя
 * @return mixed
 */
function getCurrentUser()
{
    return $_SESSION['user'];
}

/**
 * Разлогивания пользователя
 */
function logout()
{
    session_destroy();
}

/**
 * Получает пользователя по логину равному $login
 * @param $login
 * @return mixed|null
 */
function getUser($login)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['login'] == $login) {
            return $user;
        }
    }
    return null;
}

/**
 * Добавление нового пользователя
 * @param $login
 * @param $password
 * @param $name
 * @return bool|int
 */
function addUser($login, $password, $name)
{
    $users = getUsers();
    // Находим максимальный ID и прибавляем к нему 1
    $id = max(array_column($users, 'id')) + 1;
    $users[] = [
        'id' => $id,
        'login' => $login,
        'password' => $password,
        'name' => $name,
    ];
    $json = json_encode($users, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    return file_put_contents(FILE_USER_DATA, $json);
}

/**
 * Получает список пользователей из файла данных
 * @return array|mixed
 */
function getUsers()
{
    if (!file_exists(FILE_USER_DATA)) {
        return [];
    }
    $fileData = file_get_contents(FILE_USER_DATA);
    $users = json_decode($fileData, true);
    if (!$users) {
        return [];
    }
    return $users;
}

/**
 * Проверка на запрос типа POST
 * @return bool
 */
function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * Получаем параметры $_GET или $_POST по имени $name
 * @param $name
 * @return null
 */
function getParam($name) {
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}

/**
 * Осуществляет редирект на указанную страницу
 * @param $action
 */
function redirect($action)
{
    header('Location: ' . $action . '.php');
    die;
}