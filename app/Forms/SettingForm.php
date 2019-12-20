<?php

namespace App\Forms;

use App\AbstractForm;
use App\Suports\Shinobi\Models\Role;

class SettingForm extends AbstractForm
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


    protected function addPassword(){

        if($this->getModel()){
            return  $this;
        }

        return  $this->add('password', 'password');

    }
}
