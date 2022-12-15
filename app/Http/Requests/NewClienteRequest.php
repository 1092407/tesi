<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class NewClienteRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *         $table->bigIncrements('id')->index();
     * @return array
     */

//regole di validazione form per concessionario che inserisce un nuovo cliente
    public function rules() {
        return [
            'name' => ['required', 'string', 'max:20'],
            'cognome' => ['required', 'string', 'max:20'],

            'username' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
             'livello' => ['required', 'string'],
              'auto' => ['required', 'string','max:25'], //modello e marca  auto
              'targa' => ['required', 'string','unique:users','max:7','min:7'],
             'datavendita' => ['required', 'date']

        ];
    }

}
