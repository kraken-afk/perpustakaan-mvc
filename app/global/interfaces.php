<?php

interface ControllerInterface {
  public function index(): void;
  public function mimeHandler(string $dir, string $filename): void;
}