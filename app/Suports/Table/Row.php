<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Suports\Table;


use App\Tenant\TraitElement;
use App\TraitTable;

class Row
{
    use TraitElement;

    protected $actualRow;

    /**
     * Row constructor.
     * @param TraitTable $tables
     */
    public function __construct($tables)
    {
        $this->tables = $tables;
    }


    /**
     * @return mixed
     */
    public function getActualRow()
    {
        return $this->actualRow;
    }

    /**
     * @param mixed $actualRow
     * @return Row
     */
    public function setActualRow($actualRow)
    {
        $this->actualRow = $actualRow;
        return $this;
    }


    public function renderRow($data, $type = 'assc')
    {


        return $this->renderArray($data, $type);
    }


    private function renderArray($data, $type = 'assc')
    {

        $headers = $this->tables->getHeaders();

        $render = [];

        foreach ($data as $rowData) {

            $this->setActualRow($rowData);

            $temp = array();

            foreach ($headers as $header) {


                    if ($type == 'assc') {

                        $temp[$header['key']] =  $this->tables->getHeader($header['key'])->getCell()->render('array');

                    } else {

                        $temp[] =  $this->tables->getHeader($header['key'])->getCell()->render('array');
                    }


            }
            $render[] = $temp;
        }
        return $render;
    }
}