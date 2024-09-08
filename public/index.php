<?php
$requiredPhpVersion = '8.1.0';

if (version_compare(PHP_VERSION, $requiredPhpVersion, '<')) {
    die("This application requires PHP version $requiredPhpVersion or higher. You are using PHP version " . PHP_VERSION);
}

require '../vendor/autoload.php';
require '../core/config.php';

$routes = require '../routes/web.php';
$basePath = BASE_URL;

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = str_replace($basePath, '', $requestUri);
$path = trim($path, '/');

if ($path === '') {
    $path = 'dashboard';
}

if (array_key_exists($path, $routes)) {

    $controllerName = $routes[$path]['controller'];
    $action = $routes[$path]['action'];
    $controllerFile = "../app/Controllers/{$controllerName}.php";

    if (file_exists($controllerFile)) {

        require $controllerFile;
        $fullControllerName = "App\\Controllers\\{$controllerName}";

        if (class_exists($fullControllerName)) {

            $controller = new $fullControllerName();

            if (method_exists($controller, $action)) {

                $controller->$action();
            } else {

                http_response_code(404);
                echo "404 - Action not found";
            }
        } else {

            http_response_code(404);
            echo "404 - Controller class not found";
        }
    } else {

        http_response_code(404);
        echo "404 - Controller file not found";
    }
} else {

    http_response_code(404);
    echo "404 - Page not found";
}
