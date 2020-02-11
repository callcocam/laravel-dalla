<?php


namespace App\Suports\Table\Param;


class Params
{
    protected $table;

    protected $search = '';

    protected $status = 'all';

    protected $between = '';

    protected $number = 0;

    protected $perPage = 15;

    protected $type = '';

    protected $date = '';

    protected $year = '';

    protected $month = '';

    protected $day = '';

    protected $start = '';

    protected $end = '';

    protected $order = 'DESC';

    protected $column = 'id';

    protected $page = 1;


    /**
     * AbstractParam constructor.
     * @param $params
     */
    public function __construct($params)
    {
        $this->params = $params;

        $this->init();
    }


    public function init()
    {

        if ($this->params) :

            foreach ($this->params as $name => $value) :

                if ($value) :

                    $this->__set($name, $value);

                endif;

            endforeach;

        endif;
    }

    /**
     * @param $table
     * @return $this
     */
    public function setTable($table)
    {

        $this->table = $table;

        return $this;
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