<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Suports\Table\Option;


class Options
{
    protected $id = 'id';

    protected $title = 'Basic Table';

    protected $endpoint = null;

    protected $order = 'DESC';

    protected $column = 'id';

    protected $status = 'status';

    protected $date = 'created_at';

    protected $showStatus = [
        'all'=>"Tudo",
        'published'=>"Ativo",
        'draft'=>"Inativo",
    ];

    protected $showItems = [6,12,24,48,95];

    /**
     * AbstractOptions constructor.
     * @param $options
     */
    public function __construct($options)
    {

        if($options):

            foreach ($options as $name => $option):

                $this->{$name} =  $option;

            endforeach;

        endif;
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