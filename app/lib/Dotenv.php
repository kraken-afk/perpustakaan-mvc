<?php

namespace Perpustakaan\lib;

use Error;
use Exception;

class Dotenv {
  protected string $path;
  private Array $env;

  public function __construct(?string $filePath = '../.env')
  {
    if (!file_exists($filePath)) throw new Exception("Could not find: $filePath");
    $this->path = $filePath;
  }

  public function load(): void
  {
    $raw = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!$raw) throw new Exception('Something went error while accesing file');

    foreach($raw as $envVariable) {
      try {
        [$key, $value] = explode('=', $envVariable);

        $this->env[$key] = preg_replace('/("|\')/m', '', $value);
      } catch (Error $_err) {
        continue;
      }

    }
  }

  public function getenv(string $key): string
  {
    return $this->env[$key] ?? '';
  }

}
