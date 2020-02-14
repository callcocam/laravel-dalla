<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */


namespace App\Services;


use App\Suports\Common\Options;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Gate;

class MenuService
{
    /**
     * @var Menu
     */
    private $menu;

    protected $permissions = [];
    protected $menus = [];
    protected $submenus = [];

    /**
     * MenuService constructor.
     * @param Menu $menu
     */
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;

        $this->init();
    }

    private function init(){

        $menus = $this->menu->findBy(['status'=>Options::DEFAULT_PUBLISHED_STATUS])->get();

        if($menus){

            foreach ($menus as $menu){

                if($menu->route){
                    $this->permissions[sprintf("admin.%s.%s", $menu->slug, $menu->action)] = [sprintf("admin.%s.%s", $menu->route, $menu->action)];
                }
                else{

                    $submenus = $menu->submenus()->get();

                    if($submenus->count()){

                        $map = $submenus->map(function ($items) {

                            $data = sprintf("admin.%s.%s", $items->slug, $items->action);

                            return $data;

                        });

                        $this->permissions[sprintf("admin.%s.%s", $menu->slug, $menu->action)] = $map->toArray();

                        $this->submenus[sprintf("admin.%s.%s", $menu->slug, $menu->action)] = $submenus->toArray();

                    }
                }
            }
        }

        $this->menus = $menus;

    }

    /**
     * @return array
     */
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * @param array $menus
     */
    public function setMenus(array $menus): void
    {
        $this->menus = $menus;
    }

    /**
     * @return array
     */
    public function getPermissions($menu): array
    {
        return $this->permissions[sprintf("admin.%s.%s", $menu->slug, $menu->action)];
    }

    /**
     * @param array $permissions
     */
    public function setPermissions(array $permissions): void
    {
        $this->permissions = $permissions;
    }

    /**
     * @return array
     */
    public function getSubmenus(): array
    {
        return $this->submenus;
    }

    /**
     * @param array $submenus
     */
    public function setSubmenus(array $submenus): void
    {
        $this->submenus = $submenus;
    }
}
