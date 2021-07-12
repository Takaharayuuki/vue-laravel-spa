<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// /* ログイン API */
// Route::post('/login', 'App\Http\Controllers\LoginController@login');
// /* ログアウト API */
// Route::post('/logout', 'App\Http\Controllers\LoginController@logout');

/* タスク一覧取得API */
Route::get('/tasks', 'App\Http\Controllers\TaskController@index');
/* タスク詳細取得API */
Route::get('tasks/{task}', 'App\Http\Controllers\TaskController@show');
/* タスク登録API */
Route::post('/tasks', 'App\Http\Controllers\TaskController@store');
/* タスク更新API */
Route::put('/tasks/{task}', 'App\Http\Controllers\TaskController@update');
/* タスク削除API */
Route::delete('/tasks/{task}', 'App\Http\Controllers\TaskController@destroy');
