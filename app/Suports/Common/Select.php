<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Suports\Common;

use App\Model\Admin\Company;
use App\User;
use App\Model\Admin\File;
use Illuminate\Database\Query\Builder;

trait Select
{

    protected $source;


    public function author()
    {
        $user = $this->user()->first();
        $user->append('avatar');
        $user->append('avatar_filename');
        $user->append('created_mm_dd_yyyy');
        return $user;
    }


    public function user()
    {

        return $this->belongsTo(User::class);
    }


    /**
     * @return File
     */
    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    
    public function input(){

        return Input::query()->where('assets', $this->getTable())->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery()
    {

        return parent::query();
    }

    public function getSources()
    {
        if (!$this->source) {
            $this->source = $this->query();
        }
        return $this->source;
    }
    public function findById($id, $columns = ['*'])
    {

        $result = $this->where([
            'id' => $id
        ])->first($columns);

        if ($result) {

            return $result;
        }
        return FALSE;
    }

    public function findAll($columns = ['*'])
    {
        return parent::all($columns);
    }

    public function findBy($where, $columns =["*"])
    {

        $result = $this->select($columns)->where($where);

        if ($result) {
            /**
             * @var $result Builder
             */
            return $result;
        }
        return FALSE;
    }



}
