<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;


use App\Model\Admin\Company;

class CompanyController extends AbstractController
{

   protected $template = 'companies';

   protected $model = Company::class;


}
