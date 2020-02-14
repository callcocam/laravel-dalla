<?php

namespace App\Forms;

use App\AbstractForm;
use App\Provider;
use App\User;

class InputProcessStepForm extends AbstractForm
{
    public function buildForm()
    {
        $this->add('stage_id', 'hidden',[
            'default_value'=>$this->request->get('stage')
        ])
            ->add('order_id', 'hidden',[
                'default_value'=>$this->request->get('ordem_servico')
            ]);
        if($this->getModel()){
            $this->add('id', 'hidden');
            if($this->getModel()->status == 'payment'){
                $this->addReadonly();
            }
            else{
                $this->addEditable();
            }
        }
        else{
            $this->addCreate();
        }


        parent::buildForm();
    }

    private function addCreate(){
            $this->add('number_of_damaged_pieces', 'hidden',[
                 'default_value'=>0
            ])
            ->add('provider_id', 'entity',[
                'class' => Provider::class,
                'label'=>'Fornecedor',
                'empty_value' => '=== Selecione Um Fornecedor ==='
            ])->add('responsible_id', 'entity',[
                'class' => User::class,
                    'label'=>'Responsavel',
                'empty_value' => '=== Selecione Um Fornecedor ==='
            ])->add('date', 'date',[
                'label'=>'Data',
                'default_value'=>date("Y-m-d"),
            ])
            ->add('number_of_pieces', 'text',[
                'label'=>'Número de peças'
            ])
            ->add('expected_delivery_date', 'date',[
                'label'=>'Data prevista de entrega',
                'default_value'=>today()->addDays($this->request->get('delivery',1))->format("Y-m-d"),
            ])
            ->add('piece_value', 'text',[
                'label'=>'Valor de cada peça'
            ])
            ->addDescription()
            ->add('status', 'choice',[
                'choices'=>[
                    'draft'=>"Em Andameto"
                ],
                'default_value'=>'draft',
                'label'=>'Situação Da Etapa',
                'expanded'=>true,
            ])
            ->addSubmit();

    }


    private function addEditable(){
            $this
            ->add('provider_id', 'entity',[
                'class' => Provider::class,
                'label'=>'Fornecedor',
                'empty_value' => '=== Selecione Um Fornecedor ==='
            ])->add('responsible_id', 'entity',[
                'class' => User::class,
                    'label'=>'Responsavel',
                'empty_value' => '=== Selecione Um Fornecedor ==='
            ])->add('date', 'date',[
                'label'=>'Data',
                'default_value'=>date("Y-m-d"),
            ])
            ->add('number_of_pieces', 'text',[
                'label'=>'Número de peças'
            ])
            ->add('expected_delivery_date', 'date',[
                'label'=>'Data prevista de entrega',
                'default_value'=>today()->addDays($this->request->get('delivery',1))->format("Y-m-d"),
            ])
            ->add('number_of_damaged_pieces', 'text',[
                'label'=>'Número de peças danificadas',
                'default_value'=>0
            ])
            ->add('piece_value', 'text',[
                'label'=>'Valor de cada peça'
            ])
            ->addDescription()
            ->add('status', 'choice',[
                'choices'=>[
                    'draft'=>"Em Andameto",
                    'pause'=>"Pausado",
                    'feedstock'=>"Aguardando Matéria Prima",
                    'published'=>"Finalizado",
                    'payment'=>"Gerar Pagamento",
                ],
                'default_value'=>'draft',
                'label'=>'Situação Da Etapa',
                'expanded'=>true,
            ])
            ->addSubmit();

    }


    private function addReadonly(){

            $this
                ->add('provider_id', 'hidden')
                ->add('responsible_id', 'hidden')
                ->add('providers', 'text',[
                'label'=>'Fornecedor',
                'default_value'=>$this->getModel()->provider->name,
                'attr'=>[
                    'readonly'=>true
                ],
            ])
            ->add('responsible', 'text',[
                'label'=>'Responsavel',
                'default_value'=>$this->getModel()->user->name,
                'attr'=>[
                    'readonly'=>true
                ],
            ])
            ->add('stages', 'text',[
                'label'=>'Etapa',
                'default_value'=>$this->getModel()->stage->name,
                'attr'=>[
                    'readonly'=>true
                ],
            ])->add('date', 'text',[
                'label'=>'Data',
                'attr'=>[
                    'readonly'=>true
                ],
            ])
            ->add('number_of_pieces', 'text',[
                'label'=>'Número de peças',
                'attr'=>[
                    'readonly'=>true
                ],
            ])
            ->add('expected_delivery_date', 'date',[
                'label'=>'Data prevista de entrega',
                'attr'=>[
                    'readonly'=>true
                ],
            ])
            ->add('number_of_damaged_pieces', 'text',[
                'label'=>'Número de peças danificadas',
                'attr'=>[
                    'readonly'=>true
                ],
            ])
            ->add('piece_value', 'text',[
                'label'=>'Valor de cada peça',
                'attr'=>[
                    'readonly'=>true
                ],
            ])
            ->addDescription()
            ->add('status', 'choice',[
                'choices'=>[
                    'payment'=>"Gerar Pagamento",
                ],
                'label'=>'Situação Da Etapa',
                'expanded'=>true,
            ])
            ->addSubmit();

    }

}
