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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('locale/{locale}','MainController@changeLocale')->name('locale');

Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

Route::middleware(['set_locale'])->group(function (){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::group(['middleware' => 'isAdmin'], function (){
        Route::get('admin/users', 'AdminController@users')->name('admin.users');
    });

    Route::get('/projects', 'ProjectController@index')->name('project_list');


    Route::resource('projects', 'ProjectController');

    Route::get('/home', 'ProjectController@index')->name('project_list');

    Route::group(['prefix' => 'task_list'], function (){
        Route::get('{project_id}', 'TaskController@index')->name('task_list');
        Route::get('show/{task}', 'TaskController@show')->name('task.show');
        Route::get('edit/{task}', 'TaskController@edit')->name('task.edit');
        Route::get('task/create', 'TaskController@create')->name('task.create');
        Route::post('task/store', 'TaskController@store')->name('task.store');
        Route::delete('destroy/{task}', 'TaskController@destroy')->name('task.destroy');
        Route::put('update/{task}', 'TaskController@update')->name('task.update');
        Route::get('download/{task}', 'TaskController@download')->name('task.download');
    });



    Route::get('/generate', 'ProjectController@generate')->name('generate.project');

});

