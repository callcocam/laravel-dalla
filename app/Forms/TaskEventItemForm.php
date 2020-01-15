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
                ]
            )
            ->add('description', 'text',
                [

                    'label_show'=>false,
                    'default_value'=>$this->getData('description')
                ]
            )->add('status', 'choice',[
                'choices'=>[
                    'draft'=>"Aguardando",
                    'published'=>"Completa",
                ],
                'default_value'=>$this->getData('status','draft'),
                'label_show'=>false,
                'expanded'=>true,
            ])
            ->addSubmit(sprintf("Atualizar Tarefa - %s",$this->getData('taskName') ));


        parent::buildForm();
    }
}
