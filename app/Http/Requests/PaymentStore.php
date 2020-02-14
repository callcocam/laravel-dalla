<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStore extends FormRequest
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
            'provider_id'=>['required'],
            'payment_date'=>['required'],
            'price'=>['required'],
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
