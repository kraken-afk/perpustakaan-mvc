<?php

require_once '../app/global/config.php';

class NotFoundController extends Controller
{
  const DIR = VIEWS . '404/';

  public function index(): void
  {
    require_once self::DIR . 'index.html';
  }
}
