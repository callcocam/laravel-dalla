<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\Company::class, 1)->create();

        factory(\App\Suports\Shinobi\Models\Role::class)->create([
            'company_id'=>get_tenant_id(),
            'name'=>'Super Admin',
            'slug'=>'super-admin',
            'special'=>'all-access'
        ]);
        factory(\App\Suports\Shinobi\Models\Role::class)->create([
            'company_id'=>get_tenant_id(),
            'name'=>'Gerente',
            'slug'=>'gerente',
            'special'=>null,
            'description'=>'Consegue fazer todas as operações no sistema',
        ]);
        factory(\App\Suports\Shinobi\Models\Role::class)->create([
            'company_id'=>get_tenant_id(),
            'name'=>'Cliente ',
            'slug'=>'cliente ',
            'special'=>null,
            'description'=>'Consegue fazer pedidos, acompanhar pedidos ',
        ]);
        factory(\App\Suports\Shinobi\Models\Role::class)->create([
            'company_id'=>get_tenant_id(),
            'name'=>'Funcionários ',
            'slug'=>'funcionarios ',
            'special'=>null,
            'description'=>'Consegue visualizar eventos',
        ]);

        factory(\App\User::class,1)->create()->each(function ($user){

            $user->address()->save(factory(\App\Addres::class)->make());

            $role  = \App\Suports\Shinobi\Models\Role::query()->where('special','all-access')->first();

            if($role){
                $user->roles()->sync($role);
            }

        });


    //$this->call(StoredRoutesTableSeeder::class);
    // $this->call(ProductSeeder::class);

}
}
