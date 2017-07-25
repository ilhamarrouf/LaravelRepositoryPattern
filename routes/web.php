<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('tasks')->group(function () {
    Route::get('/{id?}', 'TaskController@getAllTasks')->name('task.index');
    Route::post('store', 'TaskController@postStoreTask')->name('task.store');
    Route::patch('{id}/update', 'TaskController@postUpdateTask')->name('task.update');
    Route::delete('{id}/delete', 'TaskController@postDeleteTask')->name('task.delete');
});
