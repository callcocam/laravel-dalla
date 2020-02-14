<?php

namespace App\Forms;

use App\AbstractForm;
use App\Suports\Shinobi\Models\Role;

class FabricForm extends AbstractForm
{
    public function buildForm()
    {
        if($this->getModel()){
            $this->add('id', 'hidden');
        }

        $this
            ->add('slug', 'hidden')
            ->add('name', 'text',[
                'label'=>'Nome'
            ])
            ->add('reference', 'text',[
                'label'=>'Referencia'
            ])
            ->add('metreage', 'text',[
                'label'=>'Metragem'
            ])
            ->add('amount', 'text',[
                'label'=>'Quantidade'
            ])
            ->add('width', 'text',[
                'label'=>'Largura'
            ])
            ->add('price', 'text',[
                'label'=>'Valor'
            ])
            ->add('minimum_quantity', 'text',[
                'label'=>'Quantidade mínima '
            ])
            ->add('cover', 'file',[
                'label'=>'Capa'
            ])
            ->addDescription()
            ->getStatus("Ativo", "Inativo")
            ->addSubmit();

        parent::buildForm();
    }

}
