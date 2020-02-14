<?php

namespace App\Forms;

use App\AbstractForm;
use App\Provider;
use App\User;

class OutputProcessStepForm extends AbstractForm
{
    public function buildForm()
    {
        if($this->getModel()){
            $this->add('id', 'hidden');
        }
        $this
            ->add('stage_id', 'hidden',[
                'default_value'=>$this->request->get('stage')
            ])
            ->add('order_id', 'hidden',[
                'default_value'=>$this->request->get('ordem_servico')
            ])
            ->add('provider_id', 'entity',[
                'class' => Provider::class,
                'empty_value' => '=== Selecione Um Fornecedor ==='
            ])->add('responsible_id', 'entity',[
                'class' => User::class,
                'empty_value' => '=== Selecione Um Fornecedor ==='
            ])
            ->add('date', 'date',[
                'label'=>'Data'
            ])
            ->add('number_of_pieces', 'text',[
                'label'=>'Número de peças'
            ])
            ->add('expected_delivery_date', 'date',[
                'label'=>'Data prevista de entrega'
            ])
            ->add('number_of_damaged_pieces', 'text',[
                'label'=>'Número de peças danificadas'
            ])
            ->add('piece_value', 'text',[
                'label'=>'Valor de cada peça'
            ])
            ->addDescription()
            ->add('status', 'choice',[
                'choices'=>[
                    'published'=>"Finalizado",
                    'draft'=>"Em Andameto",
                    'pause'=>"Pausado",
                    'feedstock'=>"Aguardando Matéria Prima",
                ],
                'label'=>'Situação Da Etapa',
                'expanded'=>true,
            ])
            ->addSubmit();

        parent::buildForm();
    }

}
