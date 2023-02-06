<?php

require_once '../app/global/config.php';

class PenerbitController extends Controller
{
  const DIR = VIEWS . 'Penerbit/';

  public function index(): void
  {
    require_once self::DIR . 'index.php';
  }
}
