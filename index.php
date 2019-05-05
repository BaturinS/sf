<?php

// Загружаем и инициализируем глобальные библиотеки
require_once 'app/bootstrap.php';

// Внутренняя маршрутизация
$uri = $_SERVER['REQUEST_URI'];
if ($uri == '/') {
    list_action();
} elseif (strpos($uri,'/show') === 0 && isset($_GET['id'])) {
    show_action($_GET['id']);
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
