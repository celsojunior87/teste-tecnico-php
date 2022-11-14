<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class UsuariosRequest extends FormRequest
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
            'name' => ['required'],
            'name_login' => ['required', Rule::unique('usuarios', 'name_login')->ignore($this->id)],
            'email' => ['required','email', Rule::unique('usuarios', 'email')->ignore($this->id)],
            'zipcode' => ['required'],
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[0-9]/',      // must contain at least one digit
            ],

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é Obrigatorio',
            'name_login.required' => 'O nome é Obrigatorio',
            'name_login.unique' => 'O usuário ja existe na base de dados',
            'email.email' => 'Por favor, coloque o um e-mail valido',
            'email.unique' => ' O E-mail ja existe em nossa base de dados',
            'email.required' => 'O E-mail é Obrigatório',
            'zipcode.required' => ' O zipcode é Obrigatório',
            'password.required' => ' O Password é Obrigatório',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $keys = $errors->keys();
        $all = $errors->all();

        $return = [];
        foreach ($keys as $index => $key) {
            $return[$key] = $all[$index];
        }

        throw new HttpResponseException(response()->json([
            'validators' => $return
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
