<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class,'dashboard'])->name('dashboard');
Route::get('completed',[PagesController::class,'completed'])->name('completed');


Route::get('tasks',[TaskController::class,'index'])->name('task.index');
Route::get('tasks/create',[TaskController::class,'create'])->name('task.create');
Route::post('tasks/create/store',[TaskController::class,'store'])->name('task.store');
Route::get('tasks/edit/{id}', [TaskController::class,'edit'])->name('task.edit');
Route::put('tasks/edit/update/{id}',[TaskController::class,'update'])->name('task.update');
Route::post('tasks/done/{id}',[TaskController::class,'done'])->name('task.done');
Route::post('tasks/ongoing/{id}',[TaskController::class,'ongoing'])->name('task.ongoing');
Route::delete('tasks/delete/{id}',[TaskController::class,'destroy'])->name('task.delete');

