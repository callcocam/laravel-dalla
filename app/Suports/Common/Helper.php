<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Suports\Common;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

trait Helper
{

    public $slug_fixed = false;

    protected function slug(&$input)
    {

        if (!$this->slug_fixed) {

            $input[Options::DEFAULT_COLUMN_SLUG] = Str::slug($input[Options::DEFAULT_COLUMN_SLUG_ORIGEM]);
        }

        return $input;
    }

    protected function convert_date(&$input)
    {

        if (!isset($input['id'])) {

            $input['created_at'] = date("Y-m-d H:i:s");
            $input['updated_at'] = date("Y-m-d H:i:s");
        } else {
            unset($input['created_at']);
            $input['updated_at'] = date("Y-m-d H:i:s");
        }

        return $input;
    }

    protected function convert_password(&$input)
    {

        if (isset($input['password'])) {

            $input['password'] = Hash::make($input['password']);
        }

        return $input;
    }

    protected function initCover(&$input)
    {

        if (!isset($input[Options::DEFAULT_COLUMN_COVER])) {

            return $input;

        }
        if (!request()->hasFile(Options::DEFAULT_COLUMN_COVER) && !request()->file(Options::DEFAULT_COLUMN_COVER)->isValid()) {

            return $input;

        }
        $image = $input[Options::DEFAULT_COLUMN_COVER];

        return $this->initFile($input, $image);
    }

    protected function initAvatar(&$input)
    {

        if (!isset($input[Options::DEFAULT_COLUMN_AVATAR])) {

            return $input;

        }

        if (!request()->hasFile(Options::DEFAULT_COLUMN_AVATAR) && !request()->file(Options::DEFAULT_COLUMN_AVATAR)->isValid()) {

            return $input;

        }
        $image = $input[Options::DEFAULT_COLUMN_AVATAR];

        return $this->initFile($input, $image);
    }

    protected function initFile(&$input,UploadedFile  $image)
    {


        array_push($this->fillable,'company_id','uuid');

        $date = Str::slug(date("Y|m"));

        $extension = $image->clientExtension();

        $original = explode('.', $image->getClientOriginalName());

        $name = sprintf("%s-%s-%s.%s", rand(),time(),Str::slug(reset($original)), $extension);

        $result = $image->storePubliclyAs(sprintf("%s/%s",$this->getTable(), $date),$name);

        $data = [
            'company_id'=>get_tenant_id(),
            'uuid'=>\Str::uuid(),
            'name'=>$name,
            'fullPath'=>$result,
            'dir'=>'/dist/upload/images',
            'fileType'=>$image->getMimeType(),
            'ext'=>$image->getExtension(),
            'size'=>$image->getSize()
        ];

        /**
         * @var $fileExist MorphOne
         */
        $fileExist = $this->model->file();

        if($fileExist->first()):
            $fileExist->update($data);
        else:
            $fileExist->create($data);
        endif;

        return $input;
    }

    protected function initTags(&$input)
    {
        if (!isset($input['tag'])) {

            return $input;

        }

        //REMOVE TODAS AS TAGS
        $this->model->untag();
        //CADASTARS AS NOVAS
        $this->model->tag($input['tag']);

        return $input;
    }


    protected function initMenuss(&$input)
    {
        if (!isset($input['submenus'])) {

            return $input;

        }

        //ADD PERMISSIONS
        $this->model->submenus()->sync($input['submenus']);

        return $input;
    }

    protected function initPermissions(&$input)
    {
        if (!isset($input['privilege'])) {

            return $input;

        }

        //ADD PERMISSIONS
        $this->model->permissions()->sync($input['privilege']);

        return $input;
    }

    protected function initRoles(&$input)
    {
        if (!isset($input['role'])) {

            return $input;

        }
         //REMOVE TODAS AS TAGS
        $this->model->roles()->sync($input['role']);

        return $input;
    }

    protected function initCategorizable(&$input)
    {
        if (!isset($input['category'])) {

            return $input;

        }

        if (isset($input['id'])) {

            //UPDATE AT CATEGORIA
            $this->model->recategorize($input['category']);

            return $input;
        }

        //CADASTARS AS NOVAS
        $this->model->categorize($input['category']);

        return $input;
    }
    protected function initVideozable(&$input)
    {
        if (!isset($input['video'])) {

            return $input;

        }

        if (isset($input['id'])) {

            //UPDATE AT VIDEO
            $this->model->revideoze($input['video']);

            return $input;
        }

        //CADASTARS AS NOVOS
        $this->model->videoze($input['video']);

        return $input;
    }

    protected function initAddress(&$input)
    {

        if (!isset($input['address'])) {

            return $input;

        }

        $data = $input;

        unset($data['id']);

        array_push($this->fillable,'company_id','uuid');
        /**
         * @var $fileExist MorphOne
         */
        $addressExist = $this->model->address();

        $data = $input['address'];

        if($addressExist->first()):
            $current = $addressExist->first()->toArray();
            $addressExist->update(array_merge($current,$data));
        else:
            $addressExist->create($data);
        endif;

        return $input;
    }

    public function initArray(&$input)
    {

        if ($input) :

            foreach ($input as $key => $value) :

                if (is_array($value)) :

                    if (!in_array($key, ['tag','tags','role','privilege','address','submenus'])) :

                        $input[$key] = json_encode($value);

                    endif;

                endif;

            endforeach;

        endif;

        return $input;
    }


    protected $titile = 'Lista de Company';

    protected $messages =  'Operação finalizada com sucesso!!';

    /**
     * @return array
     */
    public function getMessage(): string
    {
        return $this->messages;
    }
}
