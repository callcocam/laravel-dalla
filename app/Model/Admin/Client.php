<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Model\Admin;
use App\AbstractModel;
use App\Suports\Shinobi\Concerns\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Client extends AbstractModel
{
    use HasRolesAndPermissions;

    protected $table ='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug', 'email', 'password', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email_verified_at'
    ];

    public function address(){

        return $this->morphOne(Addres::class, 'addresable');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(config('shinobi.models.role'), 'role_user', 'user_id', 'role_id')->withTimestamps();
    }
}
