<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class NewHomeRequest extends FormRequest {

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
    public function rules() {
        return [
            'titolo' => 'required|string|max:30',
            'regione' => 'required|string',
            'citta' => 'required|string',
            'cap' => 'required|integer',
            'indirizzo' => 'required|string',
            'numero' => 'required|integer',
            'prezzo' => 'required|numeric|min:0',
            'descrizione' => 'required|string|max:2500',
            'superficie' => 'required|integer|min:0',
            'letti_pl' => 'exclude_if:tipologia,0|integer|min:1|max:2',
            'letti_ap' => 'required|integer|min:0',
            'n_camere' => 'required|integer|min:0',
            'tipologia' => 'required|boolean',
            'foto' => 'sometimes|file|mimes:jpeg,png|max:1024',
            'periodo_locazione' => 'required|integer|min:3|max:12',
            'eta_max'=>'sometimes|integer|max:90|min:18'
        ];
    }

    /**
     * Override: response in formato JSON
    */
    protected function failedValidation(Validator $validator)
    {                                          //tutti i messaggi di errori    // sarebbe il codice 442
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}
