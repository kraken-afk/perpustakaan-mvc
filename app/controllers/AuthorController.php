<?php

require_once '../app/global/config.php';

class AuthorController extends Controller
{
  const DIR = VIEWS . 'Author/';

  public function index(): void
  {
    require_once MODELS . 'PerpustakaanAPI.php';
    require_once self::DIR . 'index.php';
  }
}
