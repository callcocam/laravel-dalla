<?php

namespace App\Forms;

use App\AbstractForm;
use App\Suports\Shinobi\Helper;
use App\Suports\Shinobi\Models\Permission;

class PermissionForm extends AbstractForm
{
    /**
     * @var Helper
     */
    private $helper;


    /**
     * PermissionForm constructor.
     * @param Helper $helper
     */
    public function __construct(Helper $helper)
    {

        $this->helper = $helper;
    }

    public function buildForm()
    {
        $this
            ->add('id', 'hidden')
            ->add('slug', 'hidden')
            ->addPermissions()
            ->add('groups', 'text')
            ->addDescription()
            ->getStatus()
            ->addSubmit();

           parent::buildForm();

    }


    protected function addPermissions(){


        $model = $this->helper->getPermissions();

        if(!$model)
            return $this;


        return  $this->add('name', 'select',[
            'choices' => $model,
            'label'=>'Nome'
        ]);

    }

}
