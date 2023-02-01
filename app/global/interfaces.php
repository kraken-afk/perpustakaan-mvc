<?php

interface ControllerInterface {
  public function index(): void;
  public function takeFile(string $source, string $destination): void;
}