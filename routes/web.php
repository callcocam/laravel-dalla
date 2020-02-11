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
Route::get('/linksimbolico', function (){

    \Illuminate\Support\Facades\Artisan::call('storage:link');
});

Route::group(['prefix'=>'/'],function (\Illuminate\Routing\Router $router) {

    //BLOCK USERS ADMIN

    \App\Suports\AutoRoute::get("/","AdminController","index","admin.admin.index");
    \App\Suports\AutoRoute::get("/remove-file/{id}","AdminController","removeFile","admin.admin.remove-file");
    \App\Suports\AutoRoute::get("profile","ProfileController","profile","admin.auth.profile.form");
    \App\Suports\AutoRoute::post("profile","ProfileController","profile","admin.auth.profile");
    \App\Suports\AutoRoute::get("empresa","SettingController","setting","admin.settings.setting");
    \App\Suports\AutoRoute::post("empresa","SettingController","store","admin.settings.store");


    \App\Suports\AutoRoute::resources("usuarios","UserController","users");
    \App\Suports\AutoRoute::resources("roles","RoleController","roles");
    \App\Suports\AutoRoute::resources("permissioes","PermissionController","permissions");
    \App\Suports\AutoRoute::resources("empresas","CompanyController","companies");
    \App\Suports\AutoRoute::resources("fornecedores","ProviderController","providers");
    \App\Suports\AutoRoute::resources("grades","GridController","grids");
    \App\Suports\AutoRoute::resources("produtos","ProductController","products");





});
