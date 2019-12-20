<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;




use App\Forms\AutoRouteForm;
use App\Suports\AutoRoute\Model\AutoRouteModel;

class AutoRouteController extends AbstractController
{

   protected $template = 'auto-route';

   protected $model = AutoRouteModel::class;

   protected $formClass = AutoRouteForm::class;

}
