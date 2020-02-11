<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Suports\Table;


use App\Tenant\TraitElement;

class Header
{
    use TraitElement;


    protected $index = '';

    protected $headers =[];

    protected $cell;

    // protected $sortable = true;

    protected $visible = true;

    protected static $orderReverse = [
        'asc' => 'desc',
        'desc' => 'asc'
    ];


    public function __construct($table, $index, $headers)
    {


        $this->index = $index;

        $this->headers = $headers;

        $this->cell = new Cell($this);

        $this->cell->setTables($table);

        $this->setTables($table);

    }


    /**
     * @return Cell
     */
    public function getCell()
    {
        return $this->cell;
    }


    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    public function __get($name)
    {
        return $this->{$name};
    }

}