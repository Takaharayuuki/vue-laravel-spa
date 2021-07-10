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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/* タスク一覧取得API */
Route::get('/tasks', 'App\Http\Controllers\TaskController@index');
/* タスク詳細取得API */
Route::get('tasks/{task}', 'App\Http\TaskController@show');
/* タスク登録API */
Route::post('/tasks', 'App\Http\TaskController@store');
/* タスク更新API */
Route::put('/tasks/{task}', 'App\Http\TaskController@update');
/* タスク削除API */
Route::delete('/tasks/{task}', 'App\Http\TaskController@destroy');
