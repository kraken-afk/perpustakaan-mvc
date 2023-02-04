<?php

require_once '../app/global/config.php';

class NotFoundController extends Controller
{
  const DIR = VIEWS . '404/';

  public function index(): void
  {
    self::takeFile(self::DIR . 'style.css', './assets/style.css');
    require_once self::DIR . 'index.html';
  }

  public function mimeHandler(string $filename): void
  {
    header("Content-Type: text/css");
    readfile(self::DIR . '/style.css');
  }
}
