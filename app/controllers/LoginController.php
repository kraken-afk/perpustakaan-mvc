<?php

require_once '../app/global/init.php';

class LoginController extends Controller {
  const DIR = VIEWS . 'Login/';

  public function index(): void
  {
    self::takeFile(self::DIR . 'style.css', './style.css');
    require_once self::DIR . 'index.php';
  }
}