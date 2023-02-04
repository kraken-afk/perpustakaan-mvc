<?php

require_once '../app/global/config.php';

class LoginController extends Controller {
  const DIR = VIEWS . 'Login/';

  public function index(): void
  {
    self::takeFile(self::DIR . 'style.css', './assets/style.css');
    require_once MODELS . 'PerpustakaanAPI.php';
    require_once self::DIR . 'index.php';
  }

  public function mimeHandler(string $filename): void
  {
    header("Content-Type: text/css");
    readfile(self::DIR . '/style.css');
  }
}