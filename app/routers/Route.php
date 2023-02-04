<?php

namespace Perpustakaan\Router;

use Error;
use Exception;
use NotFoundController;

require_once '../app/global/aliases.php';
session_start();

class Route {
  private static Array $routes = [];

 public static function add(string $path, string $controller, string $function): void
 {
  self::$routes[$path] = ['path' => $path, 'controller' => $controller, 'function' => $function];
 }

 public static function run(): void
 {

  define('PATH', $_SERVER['REQUEST_URI']);

  if (preg_match("/\.\w+$/", PATH)) self::mimeRequestHandler();

  if (PATH === '/logout' && isset($_SESSION['isLogin'])) self::logOutHandler();

  if (!isset(self::$routes[PATH])) self::pageNotFoundHandler();

  self::pageRequestHandler();
 }

 private static function pageRequestHandler(?string $uri = PATH): void
 {
  ['path' => $path, 'controller' => $controller, 'function' => $function] = self::$routes[$uri];

  require_once CONTROLLERS . $controller . '.php';

  $controller = new $controller;
  $controller->$function();

  $_SESSION['URI'] = PATH;

  exit;
 }

 private static function pageNotFoundHandler(): void
 {
    require_once CONTROLLERS . 'NotFoundController.php';

    $controller = new NotFoundController;
    $controller->index();

    $_SESSION['URI'] = PATH;

    exit;
 }

 private static function logOutHandler(): void
 {
   $session = session_destroy();

   if ($session) header('Location:/');

   exit;
 }

 private static function mimeRequestHandler(): void
 {
  define('PATH_LIST', array_filter(preg_split('/\//', PATH), fn($var): string => $var));
  define('MIME_TYPE', array_slice(PATH_LIST, -1, 1)[0]);
  define('SUB_DIR', $_SESSION['URI']);

  ['controller' => $controller] = isset(self::$routes[SUB_DIR]) ? self::$routes[SUB_DIR] : ['controller' => 'NotFoundController'];

  require_once CONTROLLERS . $controller . '.php';

  $controller = new $controller;
  $controller->mimeHandler(MIME_TYPE);

  exit;
 }
}
