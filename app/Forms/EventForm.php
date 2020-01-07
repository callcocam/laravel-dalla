<?php

namespace App\Forms;

use App\AbstractForm;
use App\Model\Admin\Task;
use App\Suports\Shinobi\Models\Permission;

class EventForm extends AbstractForm
{



    public function buildForm()
    {
        if($this->getModel())
        {
            $this->add('id', 'hidden');

        }

        $this->add('slug', 'hidden')->add('end_event', 'hidden')
            ->add('name', 'text',[
                 'label' => 'Nome',
            ])
            ->add('start_event', 'date',[
                'label' => 'Inicio Do Evento',
            ])
            ->add('contractor', 'textarea',
                [
                     'label'=>'Contratante'
                ])
            ->add('observations', 'textarea',
                [
                    'label'=>'Observações'
                ])

            ->add('pre_checklist', 'textarea',
                [
                    'label'=>'Pre-Checklist'
                ])

            ->addDescription()
            ->getStatus()
            ->addSubmit();

           parent::buildForm();

    }


    protected function addTask(){


        return  $this;
    }

}
