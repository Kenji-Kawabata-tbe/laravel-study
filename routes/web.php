<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RequestSampleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HiLowController;
use App\Http\Controllers\PhotoController;

//　ルート確認コマンド
// sail artisan route:list
// 左からリクエストメソッド、パス、ルート名、コントローラ名、アクション名となる

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

// リクエスト　送信データの取得
Route::get('/form', [RequestSampleController::class, 'form']);
Route::get('/query-strings', [RequestSampleController::class, 'queryStrings']);
// リクエスト ルートパラメータ
Route::get('/users/{id}', [RequestSampleController::class, 'profile'])->name('profile');
// リクエスト URLクエリパラメータとルートパラメータの併用
// http://localhost/products/hoge/2022
// http://localhost/products/hoge/2022?page=12
Route::get('/products/{category}/{year}', [RequestSampleController::class, 'productsArchive']);
// リクエスト 名前付きルート
Route::get('/route-link', [RequestSampleController::class, 'routeLink']);

// ログイン
Route::get('/login', [RequestSampleController::class, 'loginForm']);
Route::post('/login', [RequestSampleController::class, 'login'])->name('login');

// リソースルート
// よくあるルート登録(create/delete等)をresourceメソッドを使い簡略化できる
// createのパスは/events/createとなる
Route::resource('/events', EventController::class)->only(['create','store']);

//　セッション
Route::get('/hi-low', [HiLowController::class, 'index'])->name('hi-low');
Route::post('/hi-low', [HiLowController::class, 'result']);

// ファイル管理
// シンボリックリンク登録コマンド
// sail artisan storage:link
Route::resource('/photos', PhotoController::class)->only(['create','store','show', 'destroy']);
Route::get('photos/{photo}/download', [PhotoController::class, 'download'])->name('photos.download');
