<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Http\Controllers\UserController;
class GreaterThan implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($min_value)
    {
        $this->min_value = $min_value;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->min_value <= $value;
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Il valore minimo deve essere minore del valore massimo';
    }
}
