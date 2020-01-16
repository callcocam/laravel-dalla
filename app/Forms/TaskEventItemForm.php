<?php

namespace App\Forms;

use App\AbstractForm;
use App\Model\Admin\Task;

class TaskEventItemForm extends AbstractForm
{
    public function buildForm()
    {

        $this->add('id', 'hidden',[
            'default_value'=>$this->getData('id')
            ])
            ->add('task_id', 'hidden',[
                'default_value'=>$this->getData('task_id')
            ])
            ->add('name', 'text',
                [
                    'label_show'=>false,
                    'default_value'=>$this->getData('name'),
                    'attr'=>[
                        'placeholder'=>"Digite aqui o valor pertinente a tarefa",
                        'title'=>"Descreva aqui o valor pertinente a tarefa, pode ser um número ou texto explicativo",
                    ]
                ]
            )
            ->add('description', 'text',
                [

                    'label_show'=>false,
                    'default_value'=>$this->getData('description'),
                    'attr'=>[
                        'placeholder'=>"Descreva aqui alguma informação pertinente a tarefa",
                    ]
                ]
            )->add('status', 'choice',[
                'choices'=>[
                    'draft'=>"Aguardando",
                    'published'=>"Completa",
                ],
                'default_value'=>$this->getData('status','draft'),
                'label_show'=>false,
                'expanded'=>true,
            ]);


        parent::buildForm();
    }
}
