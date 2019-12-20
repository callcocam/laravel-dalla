<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;

use App\Suports\Shinobi\Helper;
use App\Suports\Shinobi\Models\Permission;
use Kris\LaravelFormBuilder\FormBuilder;

class PermissionController extends AbstractController
{

   protected $template = 'permissions';

   protected $model = Permission::class;



   public function __construct(FormBuilder $formBuilder,Helper $helper)
   {

       parent::__construct($formBuilder);

       $this->results['permissions'] = $helper->getPermissions();
   }

}
