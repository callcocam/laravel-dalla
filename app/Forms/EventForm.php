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
//            ->add('consumption', 'text',
//                [
//                    'label'=>'Consumo(pos evento)'
//                ])
//            ->add('general_observations', 'textarea',
//                [
//                    'label'=>'Observações(pos evento)'
//                ])
            ->getStatus()
            ->addSubmit();

           parent::buildForm();

    }


    protected function addTask(){

        $model = $this->getModel();

        if(!$model)
            return $this;

        $tasks = $model->tasks()->get();

        if($tasks->count()){

            foreach ($tasks as $task) {

                $this ->add(sprintf('_tasks-%s', $task->id), 'form', [
                    'label_attr' => ['class' => 'footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center'],
                    'class' => TaskForm::class,
                    'wrapper' => false,
                    'label' =>$task->name,
                    'formOptions' => [
                        'model'=>$task
                    ],
                    'wrapper_class' => false,
                ]);
            }
        }

        $this ->add('_tasks-0', 'form', [
            'label_attr' => ['class' => 'footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center'],
            'class' => $this->formBuilder->create(TaskForm::class),
            'wrapper' => false,
            'formOptions' => [
                'model'=>null
            ],
            'label' => "Tarefas",
            'wrapper_class' => false,
        ]);

        return  $this;
    }

}
