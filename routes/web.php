<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/completed', function () {
    return view('pages.completed');
});

Route::get('/tasks', function () {
    return view('tasks.index');
});

Route::get('/tasks/create', function () {
    return view('tasks.create');
});
Route::get('/tasks/edit', function () {
    return view('tasks.edit');
});