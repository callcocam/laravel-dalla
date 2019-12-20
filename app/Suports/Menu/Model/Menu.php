<?php

namespace App\Suports\Menu\Models;

use App\AbstractModel;
use CodexShaper\Menu\Models\MenuItem;

class Menu extends AbstractModel
{
    //
    protected $table = 'menus';

    public function items()
    {
        return $this->hasMany(MenuItem::class, 'menu_id');
    }
}
