<?php

namespace App\Console\Commands;

use App\Suports\Shinobi\Models\Permission;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class AddPermissionsComand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @var Permission
     */
    private $permission;

    /**
     * @var array
     */
    private $ignore = ['auth','store'];

    /**
     * @var array
     */
    private $required = ['admin'];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Permission $permission)
    {
        parent::__construct();
        $this->permission = $permission;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->permission->slug_fixed = true;

        foreach (\Route::getRoutes() as $route) {

            if (isset($route->action['as'])):

                $data = explode(".", $route->action['as']);

                if ($this->getIgnore($data)):

                    if ($this->getRequired($data)):

                        if(!$this->permission->findBy(['name' => $route->action['as']])->first()){

                            $this->permission->saveBy([
                                'name'=>$route->action['as'],
                                'slug'=>$route->action['as'],
                                'groups'=>last($data),
                                'description'=>Str::title(str_replace("."," ",$route->action['as'])),
                                'status'=>"published",
                                'created_at'=>date("Y-m-d H:i:s"),
                                'updated_at'=>date("Y-m-d H:i:s"),
                            ]);
                            if($this->permission->getResultLastId()):
                                $this->info(sprintf("Permission %s created success full", $route->action['as']));
                            else:
                                $this->info($this->permission->getMessage());
                            endif;
                        }

                    endif;

                endif;

            endif;
        }


    }

    private function getIgnore($value){

        $result = true;

        foreach ($this->ignore as $item){

            if(in_array($item, $value)){

                $result = false;
            }
        }

        return $result;
    }


    private function getRequired($value){

        $result = false;

        foreach ($this->required as $item){

            if(in_array($item, $value)){

                $result = true;
            }
        }

        return $result;
    }
}
