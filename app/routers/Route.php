<?php

namespace Perpustakaan\Router;

require_once '../app/global/aliases.php';

class Route {
  private static Array $routes = [];

 public static function add(string $path, string $controller, string $function): void
 {
  self::$routes[$path] = ['path' => $path, 'controller' => $controller, 'function' => $function];
 }

 public static function run(): void
 {

  define('PATH', $_SERVER['REQUEST_URI']);

  if (!isset(self::$routes[PATH])) echo "Not Found";

  ['path' => $path, 'controller' => $controller, 'function' => $function] = self::$routes[PATH];

  require_once CONTROLLERS . $controller . '.php';

  $controller = new $controller;
  $controller->$function();
 }
}
