<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Suports\Call\Resources\Fields\Facades;


use App\Suports\Call\Resources\Fields\TextField;
use Illuminate\Support\Facades\Facade;

class BLT extends Facade
{

    protected static function getFacadeAccessor()
    {
        return BltField::class;
    }

}