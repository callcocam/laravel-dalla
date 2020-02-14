<?php

namespace App\Forms;

use App\AbstractForm;
use App\Provider;
use App\Suports\Shinobi\Models\Role;

class PaymentForm extends AbstractForm
{
    public function buildForm()
    {
        if($this->getModel()){
            $this->add('id', 'hidden');
        }
        $this->add('provider_id', 'entity',[
            'class' => Provider::class,
            'empty_value' => '=== Selecione Um Fornecedor ==='
        ])
            ->add('price', 'text',[
                'label'=>'Valor'
            ])
            ->add('payment_date', 'date',[
                'label'=>'Data do pagamento'
            ])
            ->addDescription()
            ->getStatus("Ativo", "Inativo")
            ->addSubmit();

        parent::buildForm();
    }

}
