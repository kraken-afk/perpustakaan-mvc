<?php

require_once '../app/global/config.php';

class HomeController extends Controller {
  const DIR = VIEWS . 'Home/';

  public function index(): void
  {
    require_once self::DIR . 'index.php';
  }
}
