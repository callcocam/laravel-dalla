<?php

namespace App\Forms;

use App\AbstractForm;

class TaskForm extends AbstractForm
{
    public function buildForm()
    {
        $this
            ->add('name', 'text',
                [
                    'label'=>'Nome'
                ]
                )
            ->add('status', 'choice',[
                'choices'=>[
                    'draft'=>'Rascunho',
                    'published'=>'Publicado',
                    'completed'=>'Concluído'
                ],
                'label'=>'Situação Da Tarefa',
                'expanded'=>true,
            ]);

        parent::buildForm();
    }
}
