<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Suports\Call\Resources\Fields\Facades;


use App\Suports\Call\Resources\Fields\HtmlField;
use Illuminate\Support\Facades\Facade;

class HTML extends Facade
{

    protected static function getFacadeAccessor()
    {
        return HtmlField::class;
    }

}