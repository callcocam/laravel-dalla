<?php

namespace App;

//use App\Suports\Call\Resources\Fields\Facades\COVER;
use App\Suports\Call\Resources\Fields\Facades\HTML;
use App\Suports\Call\Resources\Fields\Facades\ID;
use App\Suports\Call\Resources\Fields\Facades\TEXT;
use App\Suports\Shinobi\Concerns\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions, TraitModel, TraitTable;

    public $incrementing = false;

    protected $keyType = "string";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug', 'email','phone','document', 'password', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email_verified_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->defaultOptions['endpoint'] = "users";
        $this->headers = [
            ID::make('id')->hiddenList()->hiddenShow()->render(),
            //COVER::make('cover')->render(),
            TEXT::make('name')->filter()->render(),
            HTML::make('permissions')->render(),
        ];
    }
    public function address(){

        return $this->morphOne(Addres::class, 'addresable');
    }

    public function getAddressAttribute(){

        return $this->address()->first(['zip','city','state','country', 'street','district','number','complement']);
    }

    public function init()
    {
        $this->getHeader('permissions')->getCell()->addDecorator('callable', [
            'closure' => function ($context, $record) {
                return view("vendor.table.users-roles", [
                    'row'=>$record
                ])->render();
            },
        ]);
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
