<?php

use Perpustakaan\Router\Route;

require_once '../app/routers/Route.php';

Route::add('/', 'HomeController', 'index');
Route::add('/login', 'LoginController', 'index');
Route::add('/author', 'AuthorController', 'index');

Route::run();
