<?php

namespace App\Forms;

use App\AbstractForm;
use App\Model\Admin\Task;
use App\Suports\Shinobi\Models\Permission;

class EventsInfoForm extends AbstractForm
{



    public function buildForm()
    {

       $this->addDescription('important','Informações Importantes',[
                'rows'=>'3'
            ]);

        parent::buildForm();

    }


}
