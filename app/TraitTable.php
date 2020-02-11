<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App;


use App\Suports\Call\Resources\Fields\Facades\ACTION;
use App\Suports\Call\Resources\Fields\Facades\DATE;
use App\Suports\Table\Header;
use App\Suports\Table\Render;
use App\Suports\Table\Row;
use App\Tenant\TraitElement;
use Illuminate\Support\Facades\Gate;

trait TraitTable
{
    use TraitElement, TraitModel;
    protected $tableInit = false;
    protected $rows;
    protected $renderer;
    protected $prependHeaders = [];
    protected $headers = [];

    protected $appendHeaders = [];
    protected $data = [];
    protected $defaultOptions = [];
    protected $headersObjects = [];

    abstract public function init();


    abstract public function initFilter($query);

    public function actions()
    {
        $this->getHeader('action')->getCell()->addDecorator('callable', [
            'closure' => function ($context, $record) {
                $actions = [];
                if (Gate::allows(sprintf('admin.%s.edit', $this->getTable()))) {

                    $actions['edit'] = [
                        'name' => route(sprintf('admin.%s.edit', $this->getTable()), $record['id']),
                        'id' => $record['id']
                    ];
                }
                if (Gate::allows(sprintf('admin.%s.destroy', $this->getTable()))) {
                    $actions['destroy'] = [
                        'name' => route(sprintf('admin.%s.destroy', $this->getTable()), $record['id']),
                        'id' => $record['id']
                    ];
                }

                if (Gate::allows(sprintf('admin.%s.show', $this->getTable()))) {
                    $actions['show'] = [
                        'name' => route(sprintf('admin.%s.show', $this->getTable()), $record['id']),
                        'id' => $record['id']
                    ];
                }
                return $actions;
            },
        ]);
    }

    public function timestamps()
    {

        $this->getHeader('created_at')->getCell()->addDecorator('callable', [
            'closure' => function ($context, $record) {
                if($context)
                    return date_carbom_format($context)->toLongDateString();

                return '---';
            },
        ]);

        $this->getHeader('updated_at')->getCell()->addDecorator('callable', [
            'closure' => function ($context, $record) {
                if($context)
                    return date_carbom_format($context)->toLongDateString();

                return '---';
            },
        ]);
    }
    public function render($template="table",$type="html")
    {

        $this->appendHeaders = [
            DATE::make('created_at')->sortable()->render(),
            DATE::make('updated_at')->hiddenList()->render(),
            DATE::make('status')->sortable()->render(),
            ACTION::make('action',['label'=>"#"])->width()->hiddenShow()->render()
        ];

        if (!$this->tableInit) :

            $this->initialize();

        endif;

        switch ($type):

            case 'json':
                return $this->getRender()->json();
                break;
            default:
                return $this->getRender()->html($template);
                break;
        endswitch;

    }

    private function getRender()
    {

        if (!$this->renderer) {

            $this->renderer = new Render($this);
        }
        return $this->renderer;
    }

    /**
     * Inicializa a table
     */
    private function initialize()
    {

        $this->tables = $this;

        $this->setOptions($this->defaultOptions);

        if (!$this->getParams()) :

            throw new \LogicException('Param Adapter is required');

        endif;

        if (!$this->getSources()) :

            throw new \LogicException('Source data is required');

        endif;

        $this->tableInit = true;
        if($this->headers):

            $this->headers = array_merge($this->prependHeaders, $this->headers, $this->appendHeaders);

            $this->setHeaders($this->headers);

        endif;




        $this->init();

        $this->timestamps();

       $this->actions();

        $this->initFilter($this->getSources());
    }
    /**
     * @return Row
     */
    public function getRow()
    {

        if (!$this->rows) :

            $this->rows = new Row($this);
        endif;

        return $this->rows;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }
    /**
     * @return mixed
     */
    public function getHeadersArray()
    {
        $headers = [];

        if ($this->headers) {

            foreach ($this->headers as $header) {

                $headers[] = $header;
            }
        }

        return $headers;
    }
    /**
     * @return mixed
     */
    public function getHeader($name)
    {

        if (!$this->headersObjects) {
            dd($name);
            throw new \LogicException(sprintf('Table hasn\'t got defined headers [%s]', $name));
        }

        if (!isset($this->headersObjects[$name])) {

            throw new \RuntimeException(sprintf('Header name [ %s ] doesnt exist', $name));
        }

        return $this->headersObjects[$name];
    }


    /**
     * @param mixed $headers
     * @return TraitTable
     */
    public function setHeaders($headers)
    {

        if ($headers) :

            foreach ($headers as $header) :

                $this->headersObjects[$header['key']] = new Header($this, $header['key'], $header);

            endforeach;

        endif;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }


}