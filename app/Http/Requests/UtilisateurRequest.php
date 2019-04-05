<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurRequest extends FormRequest
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
            'prenom' => 'required|max:100',
            'nomfamille' => 'required|max:100',
            'courriel' => 'required|max:256|regex:/^.+@.+$/i|unique:utilisateurs',
            'nom_usager'=> 'required|max:100|unique:utilisateurs',
            'mot_de_passe' => 'required|confirmed|min:10|max:200',
        ];
        //METTRE DES RÈGLES CUSTOM POUR LES CHAMPS UNIQUE.
    }
}
