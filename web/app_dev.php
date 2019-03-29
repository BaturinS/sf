<?php

// Загружаем и инициализируем глобальные библиотеки
require_once 'model.php';
require_once 'controllers.php';

// Внутренняя маршрутизация
$uri = $_SERVER['REQUEST_URI'];
if ($uri == '/') {
    list_action();
} elseif ($uri == isset($_GET['id'])) {
    show_action($_GET['id']);
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
