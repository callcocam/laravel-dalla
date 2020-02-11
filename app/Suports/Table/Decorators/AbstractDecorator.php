<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Suports\Table\Decorators;


use App\Suports\Table\Decorators\Condition\ConditionFactory;

abstract class AbstractDecorator
{


    protected $conditions = [];


    public function addCondition($name, $options){


        if($this instanceof DataAccessInterface):

            $condition = ConditionFactory::factoryCondition($name, $options);

            $condition->setDecorator($this);

            $this->conditions[] = $condition;


            return $this;

        endif;
    }

    public function validConditions(){

        if(!count($this->conditions)):

            return true;

        endif;

        foreach ($this->conditions as $condition):

            if(!$condition->isValid()):

                return false;

            endif;

        endforeach;

        return true;

    }
}