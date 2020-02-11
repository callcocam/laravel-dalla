<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Table\Decorators\Cell;


use App\Suports\Table\Decorators\AbstractDecorator;

abstract class AbstractCellDecorator extends AbstractDecorator
{
    protected $cell;

    protected $options;

    abstract public function __construct(array $options = [], $table = null);

    /**
     * @return mixed
     */
    public function getCell()
    {
        return $this->cell;
    }

    /**
     * @param mixed $cell
     * @return AbstractCellDecorator
     */
    public function setCell($cell)
    {
        $this->cell = $cell;
        return $this;
    }

    public function getActualRow()
    {

        return $this->getCell()->getActualRow();
    }

    /**
     * Get attributes as a string
     *
     * @return null|string
     */
    public function getDecoratorAttributes($attributes)
    {
        $ret = array();

        if (count($attributes)) {
            foreach ($attributes as $name => $value) {
                $ret[] = sprintf('%s="%s"', $name, $value);
            }
        }
        return ' ' . implode(' ', $ret);
    }
}