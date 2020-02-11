<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Suports\Table;


use App\Suports\Table\Decorators\DecoratorFactory;
use App\Tenant\TraitElement;

class Cell
{
    use TraitElement;

    /**
     * @var Header
     */
    protected $header;

    /**
     * Cell constructor.
     * @param Header $header
     */
    public function __construct(Header $header)
    {
        $this->header = $header;
    }

    /**
     * @return Header
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param Header $header
     * @return Cell
     */
    public function setHeader(Header $header)
    {
        $this->header = $header;
        return $this;
    }

    public function addDecorator($name, $options = []){

        $decorator = DecoratorFactory::factoryCell($name, $options);

        $decorator->setCell($this);

        $this->attachDecorators($decorator);

        return $decorator;
    }


    public function getActualRow(){

        return $this->tables->getRow()->getActualRow();

    }

    public function getTable(){

        return $this->tables;

    }
    public function render(){

        $value = '';

        $header = $this->getHeader()->headers;


            $row = $this->getActualRow();

            $index = $header['index'];

            if(is_array($row)):

                if(isset($row[$index])):

                    $value = $row[$index];

                endif;
            else:

                $value = $row->{$index};

            endif;


            foreach ($this->decorators as $decorator):

                if($decorator->validConditions()):

                    $value = $decorator->render($value,$this->header->getTables());

                endif;

            endforeach;

        return $value;
    }
}