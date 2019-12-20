<?php

namespace App\Forms;

use App\AbstractForm;

class AddresForm extends AbstractForm
{
    public function buildForm()
    {
        $this
            ->add('zip', 'text')
            ->add('state', 'text')
            ->add('city', 'text')
            ->add('district', 'text')
            ->add('street', 'text')
            ->add('number', 'text')
            ->add('complement', 'text');

        parent::buildForm();
    }
}
