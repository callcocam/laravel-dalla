<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProviderStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'name'=>['required', 'max:190'],
            'fantasy'=>['required', 'max:190'],
            'email' => [
                'required',
                Rule::unique('providers')->ignore($this->id),
            ],
            'document' => [
                'required',
                Rule::unique('providers')->ignore($this->id),
            ]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'required'=>"Campo obrigatório"
        ];
    }
}
