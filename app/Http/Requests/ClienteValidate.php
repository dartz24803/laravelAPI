<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteValidate extends FormRequest
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
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha|min:2',
            'dob' => 'required',
            'phone' => 'required|numeric|size:9',
            'email' => 'required|email|min:5',
            'address' => 'required|min:2',
            'id' => 'required|numeric|min:2',
            'amount' => 'required',
            'date' => 'required',
        ];
    }
    function messages()
    {
        return [
            'name.required' => 'Name es un campo requerido',
            'name.alpha' => 'Name es un campo de solo letras',
            'name.min' => 'Name es un campo que requiere dos caracteres como minimo',
            'dob.required' => 'Fecha es un campo requerido',
            'phone.required' => 'Phone es un campo requerido',
            'phone.numeric' => 'Phone es un campo de solo numeros',
            'phone.size' => 'Phone es un campo de 9 digitos',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email debe contener un email valido',
            'email.min' => 'El campo email requiere minimo 5 caracteres',
            'address.required' => 'Address es un campo requerido',
            'address.min' => 'Address es un campo de minimo 2 caracteres',
            'id.required' => 'Transaction es un campo requerido',
            'id.numeric' => 'Transaction es un campo de solo numeros',
            'amount.required' => 'Amount es un campo requerido',
            'date.required' => 'Fecha es un campo requerido',
        ];
    }
}
