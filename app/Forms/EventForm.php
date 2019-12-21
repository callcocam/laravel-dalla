<?php

namespace App\Forms;

use App\AbstractForm;
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
            ])
            ->add('subtitle', 'text')
            ->add('start_event', 'date',[
                'rules' => 'required',
            ])
            ->add('end_event', 'date',[
                'rules' => 'required',
            ])
            ->add('cover', 'file')
            ->add('consumption', 'text')
            //->addTask()
            ->add('description', 'textarea')
            ->getStatus()
            ->addSubmit();

           parent::buildForm();

    }


    protected function addTask(){

        $model = $this->getModel();

        if(!$model)
            return $this;

        if($model->special)
            return $this;

        $permissions = $this->getModel()->permissions()->get();

        $data = [];

        $map = $permissions->map(function($items){
            $data = $items->id;
            return $data;
        });

        if($map){
            $data = $map->toArray();
        }

        return  $this->add('privilege', 'entity',[
            'class' => Permission::class,
            'selected'=>$data,
            'multiple'=>true,
            'expanded'=>true,
        ]);

    }

}
