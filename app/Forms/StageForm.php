<?php

namespace App\Forms;

use App\AbstractForm;

class StageForm extends AbstractForm
{
    public function buildForm()
    {
        if($this->getModel()){
            $this->add('id', 'hidden');
        }
        $this->add('slug', 'hidden')
            ->add('name', 'text',[
                'label'=>'Nome'
            ])
            ->add('ordering', 'text',[
                'label'=>'Ordem'
            ])
            ->add('alert_time', 'text',[
                'label'=>'Tempo máximo para mostrar alerta'
            ])
            ->addDescription()
            ->getStatus("Ativo", "Inativo")
            ->addSubmit();

        parent::buildForm();
    }

}
