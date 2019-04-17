<?php
/**
 * This file dispatch routes.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routeParts = explode('/', ltrim($_SERVER['REQUEST_URI'], '/') ?: HOME_PAGE);

if (empty($routeParts[1])) {
    unset($routeParts[1]);
}

if (strtolower($routeParts[0]) == 'admin') {
    $controller = 'App\Controller\\' . ucfirst($routeParts[1] ?? '') . 'AdminController';
    $method = $routeParts[2] ?? MAIN_PAGE;
} else {
    $controller = 'App\Controller\\' . ucfirst($routeParts[0] ?? '') . 'Controller';
    $method = $routeParts[1] ?? MAIN_PAGE;
}

$vars = array_slice($routeParts, 3);

foreach ($vars as $key => $var) {
    if (empty($var)) {
        unset($vars[$key]);
    }
}

if (class_exists($controller) && method_exists(new $controller(), $method)) {
    echo call_user_func_array([new $controller(), $method], $vars);
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 - Page not found';
    exit();
}

