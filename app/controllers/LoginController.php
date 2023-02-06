<?php

require_once '../app/global/config.php';

class LoginController extends Controller {
  const DIR = VIEWS . 'Login/';

  public function index(): void
  {
    require_once MODELS . 'PerpustakaanAPI.php';
    require_once self::DIR . 'index.php';
  }
}
