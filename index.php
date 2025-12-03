<?php

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Autoload classes
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/core/' . $class . '.php',
        __DIR__ . '/app/controllers/' . $class . '.php',
        __DIR__ . '/app/models/' . $class . '.php',
        __DIR__ . '/helpers/' . $class . '.php',
    ];
    
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

// Load routes
$routes = require_once __DIR__ . '/config/routes.php';

// Get request URI and method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Remove base path
$basePath = '/Kepegawaian';
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

if (empty($uri) || $uri === '/') {
    $uri = '/';
}

// Get routes for current method
$methodRoutes = $routes[$method] ?? [];

// Find matching route
$matchedRoute = null;
$params = [];

foreach ($methodRoutes as $route => $handler) {
    // Convert route pattern to regex
    $pattern = '#^' . preg_replace('/\{(\w+)\}/', '([^/]+)', $route) . '$#';
    
    if (preg_match($pattern, $uri, $matches)) {
        $matchedRoute = $route;
        
        // Extract parameters
        preg_match_all('/\{(\w+)\}/', $route, $paramNames);
        if (!empty($paramNames[1])) {
            foreach ($paramNames[1] as $index => $paramName) {
                $params[$paramName] = $matches[$index + 1] ?? null;
            }
        }
        
        break;
    }
}

// If no route found, show 404
if (!$matchedRoute) {
    http_response_code(404);
    die('404 - Page Not Found');
}

// Get controller and method
list($controllerName, $methodName) = $handler;

// Check if controller exists
$controllerFile = __DIR__ . '/app/controllers/' . $controllerName . '.php';
if (!file_exists($controllerFile)) {
    die("Controller not found: {$controllerName}");
}

require_once $controllerFile;

// Check if controller class exists
if (!class_exists($controllerName)) {
    die("Controller class not found: {$controllerName}");
}

// Create controller instance
$controller = new $controllerName();

// Check if method exists
if (!method_exists($controller, $methodName)) {
    die("Method not found: {$controllerName}::{$methodName}");
}

// Call controller method with parameters
try {
    call_user_func_array([$controller, $methodName], array_values($params));
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

