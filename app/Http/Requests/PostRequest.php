<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
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
        return [
            "title" => 'required',
            "content" => 'required',
            "user_id" => 'required'
        ];
    }

    /**
    * Configure the validator instance.
    *
    * @param Validator  $validator
    * @return void
    */
    protected function failedValidation(Validator $validator){

        throw new HttpResponseException(response()->json($validator->errors(), 422));

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'El Titulo del Post es requerido',
            'content.required'  => 'El Contenido del Post es requerido',
            'user_id.required' => 'El Id del Usuario del Post es requerido'
        ];
    }

}
