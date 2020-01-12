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

Auth::routes(['register'=>false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function (){

    return redirect('/');
})->name('home-redirect');

Route::group(['prefix'=>'/'],function (\Illuminate\Routing\Router $router) {

    //BLOCK USERS ADMIN
    $router->get('/', "Admin\\AdminController@index")
        ->name('admin.admin.index');

    $router->get('/remove-file/{id}', "Admin\\AdminController@removeFile")
        ->name('admin.admin.remove-file');

    $router->get('/profile', 'Admin\\ProfileController@profile')
        ->name('admin.auth.profile.form');

    $router->post('/profile', 'Admin\\ProfileController@store')
        ->name('admin.auth.profile');

    $router->get('/empresa', 'Admin\\SettingController@setting')
        ->name('admin.settings.setting')->middleware('can:admin.settings.show');

    $router->post('/empresa', 'Admin\\SettingController@store')
        ->name('admin.settings.store')->middleware('can:admin.settings.store');

    \App\Suports\AutoRoute\Facade\AutoRoute::register();

    $router->group(['prefix'=>'eventos'], function($router){

        $router->get('/{id}/tarefas', 'Admin\\EventController@task')
            ->name('admin.tasks.index')->middleware('can:admin.tasks.index');

        $router->post('/tarefas/update', 'Admin\\EventController@updateTask')
            ->name('admin.tasks.update')->middleware('can:admin.tasks.update');

        $router->post('/tarefas/create', 'Admin\\EventController@createTask')
            ->name('admin.tasks.update')->middleware('can:admin.tasks.update');


        $router->post('/tarefas/delete', 'Admin\\EventController@deleteTask')
            ->name('admin.tasks.delete')->middleware('can:admin.tasks.delete');

        $router->post('/pos-evento/store', 'Admin\\EventController@posEvent')
            ->name('admin.pos-events.store')->middleware('can:admin.pos-events.store');
    });


});
