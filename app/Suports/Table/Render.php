<?php


namespace App\Suports\Table;


use App\Tenant\TraitElement;

class Render
{
    use TraitElement;

    private $param = [];

    public function __construct($tables)
    {

        $this->setTables($tables);

        $this->options = $this->getTables()->getOptions();

        $this->param = $this->getTables()->getParams();

        $this->param->init();
    }

    public function html($template="table")
    {

        $data = $this->getTables()->getData();

        $rows = $this->getTables()->getRow()->renderRow($data, 'assc');

        $this->paramsWrap($data);

        $this->setVariable('headers', $this->getTables()->getHeadersArray());

        $this->setVariable('rows', $rows);

        $headers = $this->getTables()->getHeadersArray();

        $variables = $this->variables;

        $params = $this->query($data);

        $options = $this->paramsWrap();

        return view(sprintf("vendor.table.%s", $template),
            compact('data','variables','headers','rows','options','params')
        );
    }


    public function json()
    {

        $data = $this->getTables()->getData();

        $rows = $this->getTables()->getRow()->renderRow($data, 'assc');

        $this->paramsWrap();

        $this->setVariable('headers', $this->getTables()->getHeadersArray());

        $this->setVariable('rows', $rows);

        return $this->variables;
    }

    private function paramsWrap()
    {
        $option['id'] = $this->options->id;
        $option['title'] = $this->options->title;
        $option['status'] = $this->options->status;
        $option['showStatus'] = $this->options->showStatus;
        $option['showItems'] = $this->options->showItems;
        $option['order'] = $this->options->order;
        $option['endpoint'] = $this->options->endpoint;
        $option['column'] = $this->options->column;
        return $option;
    }

    private function query($data)
    {
        $query['status'] = $this->param->status;
        $query['search'] = $this->param->search;
        $query['perPage'] = $this->param->perPage;
        $query['order'] = $this->param->order;
        $query['column'] = $this->param->column;
        $query['total'] = $data->total();
        $query['page'] = $data->currentPage();
        if ($data->total() <= $this->param->perPage) {
            $query['page'] = '1';
        }
       return $query;
    }

}