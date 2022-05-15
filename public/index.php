<?php

require_once 'vendor/autoload.php';

preg_match('/^\/api\/redis$|\/api\/redis\//', $_SERVER['REQUEST_URI'], $uri);
if (!empty($uri)) {
    $controller = new \App\Http\Controller\RedisController();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo $controller->get()->jsonSerialize();
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $key = str_replace('/api/redis/', '', $_SERVER['REQUEST_URI']);
        echo $controller->delete($key)->jsonSerialize();
        exit;
    }
}

if ($_SERVER['REQUEST_URI'] === '/') {
    require_once 'view/redis.php';
} else {
    $error = new \App\Http\Response\ApiResponse(['message' => 'Error info message'], 500, false);
    echo $error->jsonSerialize();
}
