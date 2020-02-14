<?php

namespace App\Suports\Shinobi\Models;

use App\Suports\Call\Resources\Fields\Facades\HTML;
use App\Suports\Call\Resources\Fields\Facades\ID;
use App\Suports\Call\Resources\Fields\Facades\TEXT;
use App\TraitModel;
use App\TraitTable;
use Illuminate\Database\Eloquent\Model;
use App\Suports\Shinobi\Concerns\HasPermissions;
use App\Suports\Shinobi\Contracts\Role as RoleContract;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model implements RoleContract
{
    use HasPermissions, TraitModel,TraitTable;
    public $incrementing = false;

    protected $keyType = "string";
    /**
     * The attributes that are fillable via mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug','description', 'special', 'status'];

    /**
     * Create a new Role instance.
     * 
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->alias = 'role';

        $this->setTable(config('shinobi.tables.roles'));
        $this->defaultOptions['endpoint'] = "roles";
        $this->headers = [
            ID::make('id')->hiddenList()->hiddenShow()->render(),
            TEXT::make('name')->filter()->render(),
            HTML::make('permissions')->render(),
            TEXT::make('description')->filter()->render(),
        ];
    }

    /**
     * Roles can belong to many users.
     *
     * @return Model
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(config('auth.model') ?: config('auth.providers.users.model'))->withTimestamps();
    }

    /**
     * Determine if role has permission flags.
     * 
     * @return bool
     */
    public function hasPermissionFlags(): bool
    {
        return ! is_null($this->special);
    }

    /**
     * Determine if the requested permission is permitted or denied
     * through a special role flag.
     * 
     * @return bool
     */
    public function hasPermissionThroughFlag(): bool
    {
        if ($this->hasPermissionFlags()) {
            return ! ($this->special === 'no-access');
        }

        return true;
    }

    public function init()
    {
        $this->getHeader('permissions')->getCell()->addDecorator('callable', [
            'closure' => function ($context, $record) {
               return view("vendor.table.roles-permissions", [
                   'row'=>$record
               ])->render();
            },
        ]);

    }

    public function initFilter($query)
    {
        // TODO: Implement initFilter() method.
    }
}
