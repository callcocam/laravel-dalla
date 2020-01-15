<?php

namespace App\Forms;

use App\AbstractForm;
use App\Model\Admin\Client;
use Illuminate\Support\Facades\Auth;

class OderForm extends AbstractForm
{
    public function buildForm()
    {
        $this ->add('id', 'hidden')
            ->addClient()
            ->add('number', 'text',
                [
                    'label_show'=>false,
                    'attr'=>[
                        'readonly'=>true,
                    ],
                ]
            )
            ->add('delivery_date', 'date',
                [
                    'label_show'=>false,
                ]
            )->add('description', 'textarea',[
                'label_show'=>false
            ])
            ->addStatus();

        parent::buildForm();
    }

    private function addStatus(){


        if(auth()->user()->hasAnyRole('cliente')){

            return $this->add('status', 'choice',[
                'choices'=>[
                    'open'=>'Aberto'
                ],
                'default_value'=>'open',
                'label_show'=>false,
                'expanded'=>true,
            ]);
        }

        if(!$this->getModel()){

            return $this->add('status', 'choice',[
                'choices'=>[
                    'open'=>'Aberto'
                ],
                'default_value'=>'open',
                'label_show'=>false,
                'expanded'=>true,
            ]);
        }

        if(in_array($this->getModel()->status, ['transit'=>'transit','completed'=>'transit'])){

            return $this->add('status', 'choice',[
                'choices'=>[
                    'transit'=>'Em transito','completed'=>'Completo'
                ],
                'default_value'=>'open',
                'label_show'=>false,
                'expanded'=>true,
            ]);
        }

        return $this->add('status', 'choice',[
            'choices'=>[
                'not-accepted'=>'Não aceito','open'=>'Aberto','transit'=>'Em transito','completed'=>'Completo'
            ],
            'default_value'=>'open',
            'label_show'=>false,
            'expanded'=>true,
        ]);

    }
    private function addClient(){


        if(auth()->user()->hasAnyRole('cliente')){

            return $this->add('client_name', 'text',
                [
                    'label_show'=>false,
                    'attr'=>[
                        'readonly'=>true,
                    ]
                ]
            )->add('client_id', 'hidden');
        }
        if($this->getData('status')){

            return $this->add('client_name', 'text',
                [
                    'label_show'=>false,
                    'attr'=>[
                        'readonly'=>true,
                    ]
                ]
            )->add('client_id', 'hidden');
        }


        return  $this->add('client_id', 'entity',[
            'class' => Client::class,
            'query_builder' => function (Client $client) {
                // If query builder option is not provided, all data is fetched
                return $client->where('is_admin', 0);
            },
            'label_show'=>false,
            'empty_value' => '=== Selecione Cliente ==='
        ]);
    }
}
