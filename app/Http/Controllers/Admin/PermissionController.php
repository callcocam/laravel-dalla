<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;

use App\Forms\PermissionForm;
use App\Suports\Shinobi\Models\Permission;

class PermissionController extends AbstractController
{

   protected $template = 'permissions';

   protected $model = Permission::class;

  protected $formClass = PermissionForm::class;
}
