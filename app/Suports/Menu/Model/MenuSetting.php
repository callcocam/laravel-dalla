<?php

namespace App\Suports\Menu\Models;

use App\AbstractModel;
use Illuminate\Database\Eloquent\Model;

class MenuSetting extends AbstractModel
{
    protected $table    = 'menu_settings';
    protected $fillable = [
        'depth', 'levels',
    ];
    protected $casts = [
        'levels' => 'array',
    ];

}
