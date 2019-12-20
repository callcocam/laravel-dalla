<?php

namespace App\Forms;

use App\AbstractForm;
use App\Suports\Shinobi\Models\Role;

class EmailRequestForm extends AbstractForm
{
    public function buildForm()
    {

        $this->add('email', 'email',[
            'template' => 'laravel-form-builder::text-inline',
            'label_show'=>false
        ])->addSubmit('Send Password Reset Link',[
            'template' => 'laravel-form-builder::button-inline'
        ]);

        parent::buildForm();
    }


}
