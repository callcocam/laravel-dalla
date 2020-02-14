<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Call\Resources\Fields;

class HtmlField extends AbstractFiled
{

    public function make($name, $opitions=null)
    {
        $this->render['name']=$name;
        $this->render['alias']=$name;
        $this->render['format']="html";
        return  parent::make($name,$opitions);
    }


}