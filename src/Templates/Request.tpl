<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ##nomePagina##Request extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nome' => 'required|max:60',
            'descricao' => 'required|max:3000',
        ];
    }

    public function messages() {
        return [
            'nome.max' => 'Limite de caracteres ultrapassado',
            'nome.required' => 'O campo :attribute precisa ser preenchido.',
            'required' => 'O campo :attribute não pode ser vazio.',
        ];
    }

}
