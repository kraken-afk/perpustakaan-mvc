<?php

namespace Perpustakaan\Router;

use NotFoundController;

require_once '../app/global/aliases.php';
session_start();

class Route {
  private static Array $routes = [];

 public static function add(string $path, string $controller, string $function): void
 {
  self::$routes[$path] = ['path' => $path, 'controller' => $controller, 'function' => $function];
 }

 public static function run( ): void
 {

  define('PATH', $_SERVER['REQUEST_URI']);

  if (PATH === '/logout' && isset($_SESSION['isLogin'])) self::logOutHandler();

  if (!isset(self::$routes[PATH])) self::pageNotFoundHandler();

  ['path' => $path, 'controller' => $controller, 'function' => $function] = self::$routes[PATH];

  require_once CONTROLLERS . $controller . '.php';

  $controller = new $controller;
  $controller->$function();
 }

 private static function pageNotFoundHandler(): void
 {
    require_once CONTROLLERS . 'NotFoundController.php';

    $controller = new NotFoundController;
    $controller->index();
    exit;
 }

 private static function logOutHandler(): void
 {
   $session = session_destroy();

   if ($session) header('Location:/');
   exit;
 }
}
