<?php

require_once '../app/global/config.php';

class NotFoundController extends Controller
{
  const DIR = VIEWS . '404/';

  public function index(): void
  {
    self::takeFile(self::DIR . 'style.css', './assets/style.css');
    require_once self::DIR . 'index.php';
  }
}
