<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  $mahasiswa = "Rani_Anjelina_Ritonga";
  $umur = 19;
  return view('index')->with('m', $mahasiswa);
});

Route::get('/', function () {
  return view('index');
});

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{room}', [RoomController::class, 'show']);
Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
Route::get('/levels/create', [LevelController::class, 'create'])->name('levels.create');
Route::post('/levels', [LevelController::class, 'store'])->name('levels.store');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
