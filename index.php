<?php
// Загружаем и инициализируем глобальные библиотеки
require_once 'model.php';
require_once 'controllers.php';
require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

// Внутренняя маршрутизация
$uri = $request->getPathInfo();
if ($uri == '/') {
    $response = list_action();
} elseif (strpos($uri,'/show') === 0 && $request->query->has('id')) {
    $response = show_action($request->query->get('id'));
} else {
    $html = '<html><body><h1>Page Not Found</h1></body></html>';
    $response = new Response($html, 404);
}

// Вывод заголовков и отправка ответа
$response->send();