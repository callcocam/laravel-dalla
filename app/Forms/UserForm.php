<?php

namespace App\Forms;

use App\AbstractForm;
use App\Suports\Shinobi\Models\Role;

class UserForm extends AbstractForm
{
    public function buildForm()
    {
        if($this->getModel()){
            $this->add('id', 'hidden');
        }
        $this->add('slug', 'hidden')
            ->add('name', 'text')
            ->add('email', 'email')
            ->addPassword()
            ->add('phone', 'tel')
            ->add('document', 'text')
            ->addRoles()
            ->add('address', 'form', [
                'label_attr' => ['class' => 'footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center'],
                'class' => $this->formBuilder->create(AddresForm::class),
                'wrapper' => false,
                'wrapper_class' => false,
            ])
            ->add('description', 'textarea')
            ->getStatus()
            ->addSubmit();

        parent::buildForm();
    }

    protected function addRoles(){

        if(!$this->getModel()){
            return  $this;
        }

        $roles = $this->getModel()->roles()->get();

        $data = [];

        $map = $roles->map(function($items){
            $data = $items->id;
            return $data;
        });

        if($map){
            $data = $map->toArray();
        }
        return  $this->add('role', 'entity', [
            'class' => Role::class,
            'selected' => $data,
            //'property' => 'name',
            //'property_key ' => 'id',
            'multiple'=>true,
            'expanded'=>true,
        ]);

    }
    protected function addPassword(){

        if($this->getModel()){
            return  $this;
        }

        return  $this->add('password', 'password');

    }
}
