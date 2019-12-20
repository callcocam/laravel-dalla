<?php

use Illuminate\Database\Seeder;

class StoredRoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                'route' => 'translate', // Pattern é parte da URI, como se vê acima
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
                'name' => 'Profile', // Nome da rota
                'slug' => 'profile', // Nome da rota
                'route' => 'admin.auth.profile.form', // Nome da rota completo
                'pattern' => '', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\ProfileController', // Nome do controller
                'method' => "profile", // Método no controller
                'resource' => false, // Este deve ser verdadeiro apenas para recursos
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
            ],
            [
                'uuid' => \Illuminate\Support\Str::uuid(),
                'company_id' => get_tenant_id(),
                'verb' => 'post', // get, post, put, delete, any
                'prefix' => 'admin', // http://something/Sample/index
                'name' => 'Profile', // Nome da rota
                'slug' => 'profile', // Nome da rota
                'route' => 'admin.auth.profile', // Nome da rota completo
                'pattern' => '', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\ProfileController', // Nome do controller
                'method' => "store", // Método no controller
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
                'slug' => 'empresa', // Nome da rota
                'route' => 'admin.settings.show', // Nome da rota completo
                'pattern' => '{id}/show', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\SettingController', // Nome do controller
                'method' => "show", // Método no controller
                'resource' => false, // Este deve ser verdadeiro apenas para recursos
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
            ],
            [
                'uuid' => \Illuminate\Support\Str::uuid(),
                'company_id' => get_tenant_id(),
                'verb' => 'post', // get, post, put, delete, any
                'prefix' => 'admin', // http://something/Sample/index
                'name' => 'Settings', // Nome da rota
                'slug' => 'empresa', // Nome da rota
                'route' => 'admin.settings.store', // Nome da rota completo
                'pattern' => 'store', // Pattern é parte da URI, como se vê acima
                'controller' => 'Admin\\SettingController', // Nome do controller
                'method' => "store", // Método no controller
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
            \App\Suports\AutoRoute\Model\AutoRouteModel::create($row);
        }
    }
}
