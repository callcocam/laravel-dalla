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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Route::group(['prefix'=>'/'],function (\Illuminate\Routing\Router $router) {

    //BLOCK USERS ADMIN
    $router->get('/', "Admin\\AdminController@index")
        ->name('admin.admin.index');

    $router->get('/profile', 'Admin\\ProfileController@profile')
        ->name('admin.auth.profile.form');

    $router->post('/profile', 'Admin\\ProfileController@store')
        ->name('admin.auth.profile');

    $router->get('/empresa', 'Admin\\SettingController@setting')
        ->name('admin.settings.setting')->middleware('can:admin.settings.show');

    $router->post('/empresa', 'Admin\\SettingController@store')
        ->name('admin.settings.store')->middleware('can:admin.settings.store');

    \App\Suports\AutoRoute\Facade\AutoRoute::register();

});


Route::get('/generate-routes', function () {

    $results = [];
    if(!\App\Suports\AutoRoute\Model\AutoRouteModel::query()->count()):
        $stored_routes = [
            [
                'uuid' => \Illuminate\Support\Str::uuid(),
                'company_id' => get_tenant_id(),
                'verb' => 'get', // get, post, put, delete, any
                'prefix' => 'admin', // http://something/Sample/index
                'name' => 'Auto Route', // Nome da rota
                'slug' => 'auto-route', // Nome da rota
                'route' => 'auto-route', // Pattern é parte da URI, como se vê acima
                'pattern' => '', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\AutoRouteController', // Nome do controller
                'method' => null, // Método no controller
                'resource' => true, // Este deve ser verdadeiro apenas para recursos
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
            ],
            [
                'uuid' => \Illuminate\Support\Str::uuid(),
                'company_id' => get_tenant_id(),
                'verb' => 'get', // get, post, put, delete, any
                'prefix' => 'admin', // http://something/Sample/index
                'name' => 'Translate', // Nome da rota
                'slug' => 'tradutor', // Nome da rota
                'route' => 'admin.translate.index', // Pattern é parte da URI, como se vê acima
                'pattern' => '', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\TradutorController', // Nome do controller
                'method' => "index", // Método no controller
                'resource' => false, // Este deve ser verdadeiro apenas para recursos
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
            ],
            [
                'uuid' => \Illuminate\Support\Str::uuid(),
                'company_id' => get_tenant_id(),
                'verb' => 'get', // get, post, put, delete, any
                'prefix' => 'admin', // http://something/Sample/index
                'name' => 'Settings', // Nome da rota
                'slug' => 'empresas', // Nome da rota
                'route' => 'companies', // Nome da rota completo
                'pattern' => '', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\CompanyController', // Nome do controller
                'method' => null, // Método no controller
                'resource' => true, // Este deve ser verdadeiro apenas para recursos
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
            ],
            [
                'uuid' => \Illuminate\Support\Str::uuid(),
                'company_id' => get_tenant_id(),
                'verb' => 'get', // get, post, put, delete, any
                'prefix' => 'admin', // http://something/Sample/index
                'name' => 'Roles', // Nome da rota
                'slug' => 'roles', // Nome da rota
                'route' => 'roles', // Nome da rota completo
                'pattern' => '', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\RoleController', // Nome do controller
                'method' => null, // Método no controller
                'resource' => true, // Este deve ser verdadeiro apenas para recursos
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
            ],
            [
                'uuid' => \Illuminate\Support\Str::uuid(),
                'company_id' => get_tenant_id(),
                'verb' => 'get', // get, post, put, delete, any
                'prefix' => 'admin', // http://something/Sample/index
                'name' => 'Permissions', // Nome da rota
                'slug' => 'permissioes', // Nome da rota
                'route' => 'permissions', // Nome da rota completo
                'pattern' => '', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\PermissionController', // Nome do controller
                'method' => null, // Método no controller
                'resource' => true, // Este deve ser verdadeiro apenas para recursos
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
            ],
            [
                'uuid' => \Illuminate\Support\Str::uuid(),
                'company_id' => get_tenant_id(),
                'verb' => 'get', // get, post, put, delete, any
                'prefix' => 'admin', // http://something/Sample/index
                'name' => 'Users', // Nome da rota
                'slug' => 'usuarios', // Nome da rota
                'route' => 'users', // Nome da rota completo
                'pattern' => '', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\UserController', // Nome do controller
                'method' => null, // Método no controller
                'resource' => true, // Este deve ser verdadeiro apenas para recursos
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
            ],
            [
                'uuid' => \Illuminate\Support\Str::uuid(),
                'company_id' => get_tenant_id(),
                'verb' => 'get', // get, post, put, delete, any
                'prefix' => 'admin', // http://something/Sample/index
                'name' => 'Menus', // Nome da rota
                'slug' => 'menus', // Nome da rota
                'route' => 'menus', // Nome da rota completo
                'pattern' => '', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\MenuController', // Nome do controller
                'method' => null, // Método no controller
                'resource' => true, // Este deve ser verdadeiro apenas para recursos
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
            ],
            [
                'uuid' => \Illuminate\Support\Str::uuid(),
                'company_id' => get_tenant_id(),
                'verb' => 'get', // get, post, put, delete, any
                'prefix' => 'admin', // http://something/Sample/index
                'name' => 'Sub Menus', // Nome da rota
                'slug' => 'sub-menus', // Nome da rota
                'route' => 'sub-menus', // Nome da rota completo
                'pattern' => '', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\SubMenuController', // Nome do controller
                'method' => null, // Método no controller
                'resource' => true, // Este deve ser verdadeiro apenas para recursos
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
            ],
        ];

        foreach ($stored_routes as $row) {
            $results[] = \App\Suports\AutoRoute\Model\AutoRouteModel::create($row);
        }
    endif;
    return $results;
});
