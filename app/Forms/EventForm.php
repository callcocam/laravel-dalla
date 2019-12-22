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


        $this->add('slug', 'hidden')
            ->add('name', 'text',[
                'rules' => 'required',
                'label' => 'Nome',
            ])
            ->add('subtitle', 'text',
                [
                    'rules' => 'required',
                    'label'=>'Sub titulo'
                ])
            ->add('start_event', 'date',[
                'rules' => 'required',
                'label' => 'Inicio Do Evento',
            ])
            ->add('end_event', 'date',[
                'rules' => 'required',
                'name' => 'Fim Do Evento',
            ])
            ->add('cover', 'file',
                [
                    'label'=>'Imagem'
                ])
            ->add('consumption', 'text',
                [
                    'label'=>'Consumo'
                ])
            ->addTask()
            ->addDescription()
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
