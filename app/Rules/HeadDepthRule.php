<?php

namespace App\Rules;

use App\Models\Employee\Employee;
use Illuminate\Contracts\Validation\Rule;

class HeadDepthRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (null == $value) {
            return true;
        }

        $depth = Employee::getDepth(Employee::whereId($value)->first());

        return $depth <= 5;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Can`t set this head. Max level depth.';
    }
}
