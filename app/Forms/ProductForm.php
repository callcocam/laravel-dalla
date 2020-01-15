<?php

namespace App\Forms;

use App\AbstractForm;

class ProductForm extends AbstractForm
{
    public function buildForm()
    {
        $this ->add('id', 'hidden')
            ->add('slug', 'hidden')
            ->add('name', 'text',
                [
                    'label'=>'Nome'
                ]
            )
            ->add('price', 'text',
                [
                    'label'=>'Valor'
                ]
            )
            ->add('stock', 'text',
                [
                    'label'=>'Estoque'
                ]
            )
            ->add('cover', 'file',
                [
                    'label'=>'Imagem'
                ]
            )
            ->addDescription()
            ->getStatus()
            ->addSubmit();

        parent::buildForm();
    }
}
