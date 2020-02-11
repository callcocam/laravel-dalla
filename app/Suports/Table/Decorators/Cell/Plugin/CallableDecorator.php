<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Table\Decorators\Cell\Plugin;


use App\Suports\Table\Decorators\Cell\AbstractCellDecorator;

class CallableDecorator extends AbstractCellDecorator
{
    public function __construct(array $options = [], $table=null)
    {
//         Exemplo
//        $this->getHeader('closureColumn')->getCell()->addDecorator('closure', array(
//            'closure' => function($context, $record){
//                return ' Imię : ' . $record['name'] . ', Nazwisko: '. $record['surname'];
//            }
//        ));
        if (!isset($options['closure'])) {
            throw new \Exception('Please define closure');
        }
        $this->options = $options;
    }

    /**
     * @param $context
     * @return mixed
     */
    public function render($context)
    {
        $closure = $this->options['closure'];
        return $closure($context, $this->getCell()->getActualRow());
    }
}