<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Kris\LaravelFormBuilder\FormBuilder;

abstract class AbstractController extends Controller
{

    protected $template = 'dashboard';
    protected $route = '';
    protected $perPage = 12;
    /**
     * @var FormBuilder
     */
    protected $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {

        $this->middleware('auth');

        $this->formBuilder = $formBuilder;
    }

    public function index(){

        $this->results['user'] = Auth::user();
        $this->results['tenant'] = get_tenant();

        if($this->model){

            $this->results['rows'] = $this->getSource()->paginate($this->perPage);
        }

        return view(sprintf('admin.%s.index', $this->template), $this->results);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = null;

        if($this->formClass){

            $form = $this->formBuilder->create($this->formClass,
                [
                    'method' => 'POST',
                    'url' => route(sprintf("admin.%s.store", $this->template))
                ]);

        }

        $this->results['form'] = $form;

        $this->results['user'] = Auth::user();

        $this->results['tenant'] = get_tenant();

        return view(sprintf('admin.%s.create', $this->template), $this->results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validator($request);

        $form = $this->formBuilder->create($this->formClass);

        // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $this->getModel()->saveBy($request->all());

        if($this->getModel()->getResultLastId()){

            if(empty($this->route)){

                notify()->success($this->getModel()->getMessage());

                if($this->getModel()->getResultLastId()){
                    return redirect()->route(sprintf("admin.%s.edit", $this->template), $this->getModel()->getResultLastId())->with('success', $this->getModel()->getMessage());
                }
                return back()->with('success', $this->getModel()->getMessage());
            }
            return redirect()->route(sprintf($this->route, $this->getModel()->getResultLastId()))->with('success', $this->getModel()->getMessage());
        }
        dd($this->getModel()->getMessage());
        notify()->error($this->getModel()->getMessage());

        return back()->withInput()->withErrors($this->getModel()->getMessage());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->results['user'] = Auth::user();

        $this->results['tenant'] = get_tenant();

        if($this->model){

            $this->results['rows'] = $this->getModel()->findById($id);
        }

        if(!$this->results['rows']){

            notify()->error("The model was not informed!!");

            return redirect()->route(sprintf("admin.%s.index", $this->template))->withErrors("The model was not informed!!");

        }

        return view(sprintf('admin.%s.show', $this->template), $this->results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->results['user'] = Auth::user();

        $this->results['tenant'] = get_tenant();

        if(!$this->model){

            notify()->error("The model was not informed!!");

            return back()->withErrors("The model was not informed!!");

        }

        $rows = $this->getModel()->findById($id);

        if(!$rows){
            notify()->error(__("The model was not informed!!"));

            return back()->withErrors(__("The model was not informed!!"));
        }
        $form = null;
        if($this->formClass){

            $form = $this->formBuilder->create($this->formClass, [
                'model'=>$rows,

            ]);
            $form->setFormOption('model',$rows);
            $form->setFormOption('method','POST');
            $form->setFormOption('url',route(sprintf("admin.%s.store", $this->template)));

        }

        //dd($rows->submenus());
        $this->results['rows'] = $rows;
        $this->results['form'] = $form;

        return view(sprintf('admin.%s.edit', $this->template), $this->results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->results['user'] = Auth::user();
        $this->results['tenant'] = get_tenant();

        return view(sprintf('admin.%s.update', $this->template), $this->results);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$this->model){

            notify()->error("The model was not informed!!");

            return back()->withErrors("The model was not informed!!");

        }

        $model = $this->getModel()->findById($id);

        if(!$model){

            notify()->error("The model was not informed!!");

            return redirect()->route(sprintf("admin.%s.index", $this->template))->withErrors("The model was not informed!!");

        }

        if($this->getModel()->deleteBy($model)){

            if(empty($this->route)){

                notify()->success($this->getModel()->getMessage());

                return redirect()->route(sprintf("admin.%s.index", $this->template))->with('success', $this->getModel()->getMessage());

            }

            return redirect()->route($this->route)->with('success', $this->getModel()->getMessage());

        }

        notify()->error($this->getModel()->getMessage());

        return back()->withErrors($this->getModel()->getMessage());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  Request  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($request)
    {

        return Validator::make($request->all(), $this->getRules())->validate();
    }

}
