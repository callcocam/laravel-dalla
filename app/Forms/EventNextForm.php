<?php

namespace App\Forms;

use App\AbstractForm;
use App\Forms\EventsInfoForm;
use App\Model\Admin\Client;
use App\Model\Admin\Task;
use App\Suports\Shinobi\Models\Permission;

class EventNextForm extends AbstractForm
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
                'label' => 'Data Do Evento',
            ])->addClients()
            ->add('contractor', 'text',
                [
                    'label'=>'Contato do contratante'
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
            ->addEventsInfo()
            ->getStatus()
            ->addSubmit();

        parent::buildForm();

    }


    protected function addClients(){


        return  $this->add('client_id', 'entity',[
            'class' => Client::class,
            'query_builder' => function (Client $client) {
                // If query builder option is not provided, all data is fetched
                return $client->where('is_admin', 0);
            },
            'label'=>'Contratante',
            'empty_value' => '=== Selecione Contratante ==='
        ]);

    }

    protected function addEventsInfo(){

        if(!auth()->user()->hasAnyRole('gerente','super-admin'))
            return $this;


        $model = $this->getModel();


        if($model){

            $model->append('info');

        }

        return $this->add('info', 'form', [
            'label_attr' => ['class' => 'footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center'],
            'class' => EventsInfoForm::class,
            'wrapper' => false,
            'wrapper_class' => false,
            'label'=>"Informações importante"
        ]);

    }

}
