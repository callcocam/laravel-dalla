<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;


use App\Forms\ProfileForm;
use App\Model\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends AbstractController
{

    protected $template = "profile";

    protected $model = User::class;

    public function profile()
    {
        $this->results['user'] = Auth::user();
        $this->results['tenant'] = get_tenant();
        $rows = [];
        if($this->model){

            $rows = $this->getModel()->findById(Auth::id());
        }

        $this->results['rows'] = $rows;

        $form = $this->formBuilder->create(ProfileForm::class, [
            'model'=>$rows,

        ]);
        $this->results['form'] = $form;
        $form->setFormOption('model',$rows);
        $form->setFormOption('method','POST');
        $form->setFormOption('url',route('admin.auth.profile'));
        return view(sprintf('admin.%s.show', $this->template), $this->results);
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
        $this->getModel()->saveBy($request->all());

        if($this->getModel()->getResultLastId()){

            notify()->success($this->getModel()->getMessage());
            return back()->with('success', $this->getModel()->getMessage());
         }
        notify()->error($this->getModel()->getMessage());
        return back()->withInput()->withErrors($this->getModel()->getMessage());
    }

}
