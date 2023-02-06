<?php

abstract class Controller implements ControllerInterface
{
  const DIR = null;

  public function index(): void
  {
  }

  public function mimeHandler(string $dir, string $filename): void
  {
    if (!file_exists($dir . $filename)) throw new Exception("$dir$filename is not exist!");

    $mimeType = self::mimeType($dir . $filename);

    header("Content-Type: $mimeType");
    readfile($dir . $filename);
  }

  private function  mimeType(string $filename): string
  {
    $mimeContentType = mime_content_type($filename);

    if ($mimeContentType !== 'text/plain') return $mimeContentType;

    $extention = array_slice(preg_split('/\./mi', $filename), -1, 1)[0];

    switch ($extention) {
      case 'js':
        $mimeContentType = 'text/javascript';
        break;
      case 'css':
        $mimeContentType = 'text/css';
        break;
      case 'html':
        $mimeContentType = 'text/html';
        break;
      default:
        $mimeContentType = 'text/plain';
    }

    return $mimeContentType;
  }
}
