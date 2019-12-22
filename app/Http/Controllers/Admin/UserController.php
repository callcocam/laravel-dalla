<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;

use App\Forms\UserForm;
use App\Model\Admin\User;

class UserController extends AbstractController
{

   protected $template = 'users';

   protected $model = User::class;

   protected $formClass = UserForm::class;

    public function index()
    {
        $this->getSource()->where('is_admin','1');

        return parent::index();
    }
}
