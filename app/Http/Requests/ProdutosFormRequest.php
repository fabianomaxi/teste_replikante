<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosFormRequest extends FormRequest
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
            'nome'              =>  'required' ,
            'preco'             =>  'required',
            'id_tipo_produtos'  => 'required',
        ];
    }

    public function messages() {

        return [
            'nome.required' => 'O campo nome é obrigatório' ,
            'preco.required' => 'O campo preço é obrigatório' ,
            'id_tipo_produtos.required' => 'O campo Tipo do Produto é obrigatório' ,
        ] ;

    }
}
