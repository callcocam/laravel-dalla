<?php


namespace App\Suports\Menus;


use Illuminate\Support\Facades\Route;

class MenuService
{

    protected $menus = [];

    /**
     * @return $this
     */
    public function parent(){

        $this->menus =$this->validate([
            [
                'cannot'=>['admin.settings.index'],
                'liClass'=>'nav-item',
                'aClass'=>'nav-item-hold',
                'iconClass'=>'nav-icon i-Gear-2',
                'route'=>'admin.settings.setting',
                'label'=>"Configurações",
            ],
            [
                'cannot'=>['admin.roles.index','admin.permissions.index'],
                'liClass'=>'nav-item',
                'aClass'=>'nav-item-hold',
                'iconClass'=>'nav-icon i-Lock-User',
                'dataItem'=>'operacional',
                'href'=>'#',
                'label'=>"Operacional",
            ],
            [
                'cannot'=>['admin.users.index'],
                'liClass'=>'nav-item',
                'aClass'=>'nav-item-hold',
                'iconClass'=>'nav-icon i-Add-User',
                'route'=>'admin.users.index',
                'label'=>"Usuários",
            ],
            [
                'cannot'=>['admin.clients.index'],
                'liClass'=>'nav-item',
                'aClass'=>'nav-item-hold',
                'iconClass'=>'nav-icon i-Checked-User',
                'route'=>'admin.clients.index',
                'label'=>"Clientes",
            ],
            [
                'cannot'=>['admin.providers.index','admin.grids.index','admin.products.index','admin.fabrics.index','admin.aviaments.index'],
                'liClass'=>'nav-item',
                'dataItem'=>'stocks',
                'aClass'=>'nav-item-hold',
                'iconClass'=>'nav-icon i-Box-Full',
                'href'=>"#",
                'label'=>"Controle De Estoque",
            ],
            [
                'cannot'=>['admin.stages.index'],
                'liClass'=>'nav-item',
                'dataItem'=>'os',
                'aClass'=>'nav-item-hold',
                'iconClass'=>'nav-icon i-Gear',
                'href'=>"#",
                'label'=>"Ordens\Serviço",
            ],
            [
                'cannot'=>['admin.payments.index'],
                'liClass'=>'nav-item',
                'aClass'=>'nav-item-hold',
                'iconClass'=>'nav-icon i-Money',
                'route'=>'admin.payments.index',
                'label'=>"Pagamentos",
            ],
        ]);
        return $this;
    }

    /**
     * @return MenuService
     */
    public function children(){

        $this->menus = [
            'operacional'=>[
                [
                    'liClass'=>'nav-item',
                    'aClass'=>'nav-item',
                    'iconClass'=>'nav-icon i-Arrow-Forward-2',
                    'route'=>'admin.permissions.index',
                    'label'=>"Permissões",
                ],
                [
                    'cannot'=>['admin.roles.index'],
                    'liClass'=>'nav-item',
                    'aClass'=>'nav-item-hold',
                    'iconClass'=>'nav-icon i-Arrow-Forward-2',
                    'route'=>'admin.roles.index',
                    'label'=>"Papéis",
                ]
            ],
            'os'=>[
                [
                    'liClass'=>'nav-item',
                    'aClass'=>'nav-item',
                    'iconClass'=>'nav-icon i-Arrow-Forward-2',
                    'route'=>'admin.stages.index',
                    'label'=>"Etapas",
                ],
                [
                    'liClass'=>'nav-item',
                    'aClass'=>'nav-item',
                    'iconClass'=>'nav-icon i-Arrow-Forward-2',
                    'route'=>'admin.orders.index',
                    'label'=>"OS/Serviço",
                ],
            ],
            'stocks'=>[
                [
                    'liClass'=>'nav-item',
                    'aClass'=>'nav-item',
                    'iconClass'=>'nav-icon i-Arrow-Forward-2',
                    'route'=>'admin.providers.index',
                    'label'=>"Fornecedor",
                ],
                [
                    'liClass'=>'nav-item',
                    'aClass'=>'nav-item',
                    'iconClass'=>'nav-icon i-Arrow-Forward-2',
                    'route'=>'admin.products.index',
                    'label'=>"Produtos",
                ],
                [
                    'liClass'=>'nav-item',
                    'aClass'=>'nav-item-hold',
                    'iconClass'=>'nav-icon i-Arrow-Forward-2',
                    'route'=>'admin.grids.index',
                    'label'=>"Grades",
                ],
                [
                    'liClass'=>'nav-item',
                    'aClass'=>'nav-item-hold',
                    'iconClass'=>'nav-icon i-Arrow-Forward-2',
                    'route'=>'admin.fabrics.index',
                    'label'=>"Tecidos",
                ],
                [
                    'liClass'=>'nav-item',
                    'aClass'=>'nav-item-hold',
                    'iconClass'=>'nav-icon i-Arrow-Forward-2',
                    'route'=>'admin.aviaments.index',
                    'label'=>"Aviamentos",
                ]
            ]
        ];

        return $this;
    }

    public function render($template="parent"){

        return view(sprintf("vendor.menus.%s", $template), [
            'menus'=>$this->menus
        ])->render();
    }

    private function validate($menus){

        $data=[];

        if($menus):
            foreach ($menus as $key => $menu):
                if(isset($menu['route'])):
                    if(Route::has($menu['route'])):
                        $data[] = $menu;
                    endif;
                else:
                    $data[] = $menu;
                endif;
            endforeach;
        endif;
        return $data;
    }
}