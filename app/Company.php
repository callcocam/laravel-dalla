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

class Company extends Model
{
    use TraitModel, TraitTable;

    public $incrementing = false;

    protected $keyType = "string";

    protected $fillable = [
        'user_id','name', 'email', 'phone', 'document','updated_at',
    ];
    protected $tenant = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->defaultOptions['endpoint'] = "companys";
        $this->headers = [
            ID::make('id')->hiddenList()->hiddenShow()->render(),
            COVER::make('cover')->render(),
            TEXT::make('name')->filter()->render(),
        ];
    }
    public function address(){

        return $this->morphOne(Addres::class, 'addresable');
    }

    public function init()
    {
        $this->getHeader('status')->getCell()->addDecorator('callable', [
            'closure' => function ($context, $record) {
                return view('vendor.table.status', compact('context'));
            },
        ]);
    }

    public function initFilter($query)
    {
        // TODO: Implement initFilter() method.
    }
}
