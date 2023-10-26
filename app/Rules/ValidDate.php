<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidDate implements Rule
{
    public function passes($attribute, $value)
    {
        $dateParts = explode('/', $value);

        if (count($dateParts) !== 3) {
            return false;
        }

        $day = (int)$dateParts[0];
        $month = (int)$dateParts[1];
        $year = (int)$dateParts[2];

        if (!checkdate($month, $day, $year)) {
            return false;
        }

        if ($year < 1930) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return 'Неверная дата.';
    }
}
