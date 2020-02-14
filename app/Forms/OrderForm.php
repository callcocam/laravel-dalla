<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace App\Forms;

use App\AbstractForm;
use App\Fabric;
use App\Grid;

class OrderForm extends AbstractForm
{
    public function buildForm()
    {
        if($this->getModel()){
            $this->add('id', 'hidden');
        }
        $this
            ->add('codigo', 'text',[
                'label'=>'Refarencia',
                "attr"=>[
                    "readonly"=>true,
                    "placeholder"=>"Geração automatica"
                ]
            ])->add('grid_id', 'entity',[
                'class' => Grid::class,
                'empty_value' => '=== Selecione Uma Grade ===',
                'label'=>'Grade'
            ])->add('fabric_id', 'entity',[
                'class' => Fabric::class,
                'empty_value' => '=== Selecione Um Tecido ===',
                'label'=>'Tecido'
            ])
            ->add('date', 'date',[
                'label'=>'Data'
            ])
            ->add('differentiated', 'text',[
                'label'=>'Diferenciado'
            ])
            ->add('line_color', 'text',[
                'label'=>'Cor Da Linha'
            ])
            ->add('washed', 'text',[
                'label'=>'Lavado'
            ])
            ->addDescription('observation','Observações')
            ->addDescription()
            ->getStatus("Ativo", "Inativo")
            ->addSubmit();

        parent::buildForm();
    }

}
