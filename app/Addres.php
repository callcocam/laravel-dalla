<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App;


use App\Suports\Call\Resources\Fields\Facades\COVER;
use App\Suports\Call\Resources\Fields\Facades\ID;
use App\Suports\Call\Resources\Fields\Facades\TEXT;
use Illuminate\Database\Eloquent\Model;

class Addres extends Model
{

    use TraitModel, TraitTable;

    public $incrementing = false;

    protected $keyType = "string";

    protected $table = "address";

    protected $fillable = [
        'user_id','name','slug','zip','city','state','country', 'street','district','number','complement','created_at','updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->defaultOptions['endpoint'] = "address";
        $this->headers = [
            ID::make('id')->hiddenList()->hiddenShow()->render(),
            COVER::make('cover')->render(),
            TEXT::make('name')->filter()->render(),
        ];
    }
    public function addresable(){

        return $this->morphTo();
    }


    public function init()
    {
        // TODO: Implement init() method.
    }

    public function initFilter($query)
    {
        // TODO: Implement initFilter() method.
    }
}
