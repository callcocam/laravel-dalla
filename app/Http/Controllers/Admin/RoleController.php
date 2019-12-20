<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;


use App\Forms\RoleForm;
use App\Suports\Shinobi\Models\Role;

class RoleController extends AbstractController
{

   protected $template = 'roles';

   protected $model = Role::class;


   protected $formClass = RoleForm::class;

}
