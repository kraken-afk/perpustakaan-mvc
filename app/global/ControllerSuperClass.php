<?php

class Controller implements ControllerInterface {
  public function index(): void {}

  public function takeFile(string $source, string $destination): void
  {
    $localStream = fopen($source, 'r');
    $publicStream = fopen($destination, 'w');

    // empty the public file each request
    fwrite($publicStream, "");

    $localFile =  fread($localStream, filesize($source));
    fwrite($publicStream, $localFile);

    fclose($localStream);
    fclose($publicStream);
  }
}