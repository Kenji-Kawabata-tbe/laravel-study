<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;

#Route::get('/', function () {
#    return view('welcome');
#});

#Route::get('/hello-world',function() {
#    return 'hello world';
#});

Route::get('/hello-world',fn() => view('hello_world'));
Route::get('/hello',fn() => view('hello', [
    'name' => '山田',
    'course' => 'Laravel',
]));

Route::get('/', fn() => view('index'));
Route::get('/curriculum', fn() => view('curriculum'));

// 世界の時間
// コントローラー作成コマンド
// sail artisan make:controller UtilityController
Route::get('/world-time', [UtilityController::class, 'worldTime']);

// おみくじ
// コントローラー作成コマンド
// sail artisan make:controller GameController
Route::get('/omikuji', [GameController::class, 'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall', [GameController::class, 'montyHall']);
