<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;

use App\Forms\ClientForm;
use App\Model\Admin\Client;

class ClientController extends AbstractController
{

   protected $template = 'clients';

   protected $model = Client::class;

   protected $formClass = ClientForm::class;

   public function index()
   {
       $this->getSource()->where('is_admin','0');

       return parent::index();
   }

}
