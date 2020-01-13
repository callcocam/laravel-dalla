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

    $router->group(['prefix'=>'ultimos-eventos'], function($router){

        $router->get('/{id}/tarefas', 'Admin\\EventLastController@task')
            ->name('admin.tasks-last.index')->middleware('can:admin.tasks-last.index');

        $router->post('/tarefas/update', 'Admin\\EventLastController@updateTask')
            ->name('admin.tasks-last.update')->middleware('can:admin.tasks-last.update');

        $router->post('/tarefas/create', 'Admin\\EventLastController@createTask')
            ->name('admin.tasks-last.update')->middleware('can:admin.tasks-last.update');


        $router->post('/tarefas/delete', 'Admin\\EventLastController@deleteTask')
            ->name('admin.tasks-last.delete')->middleware('can:admin.tasks-last.delete');

        $router->post('/pos-evento/store', 'Admin\\EventLastController@posEvent')
            ->name('admin.pos-events-last.store')->middleware('can:admin.pos-events-last.store');
    });


    $router->group(['prefix'=>'proximos-eventos'], function($router){

        $router->get('/{id}/tarefas', 'Admin\\EventNextController@task')
            ->name('admin.tasks-next.index')->middleware('can:admin.tasks-next.index');

        $router->post('/tarefas/update', 'Admin\\EventNextController@updateTask')
            ->name('admin.tasks-next.update')->middleware('can:admin.tasks-next.update');

        $router->post('/tarefas/create', 'Admin\\EventNextController@createTask')
            ->name('admin.tasks-next.update')->middleware('can:admin.tasks-next.update');


        $router->post('/tarefas/delete', 'Admin\\EventNextController@deleteTask')
            ->name('admin.tasks-next.delete')->middleware('can:admin.tasks-next.delete');

        $router->post('/pos-evento/store', 'Admin\\EventNextController@posEvent')
            ->name('admin.pos-events-next.store')->middleware('can:admin.pos-events-next.store');
    });

    $router->post('/visitas-ditribuidor/store-json/save', 'Admin\\VisitsDistributorController@updateVisit')
        ->name('admin.visits-distributors.update-visit-json')->middleware('can:visits-distributors.update-visit-json');




});
