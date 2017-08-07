<?php

if (empty($_COOKIE['myCookie'])) {
    setcookie('myCookie', 'myValue', time() - 1);
} else {
    echo $_COOKIE['myCookie'];
}


