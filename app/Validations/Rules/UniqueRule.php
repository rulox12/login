<?php

namespace App\Validations\Rules;

use Rakit\Validation\Rule;

class UniqueRule extends Rule
{
    protected $message = ":attribute :value has been used";

    protected $fillableParams = ['table', 'column', 'except'];

    public function check($value): bool
    {
        $this->requireParameters(['table', 'column']);

        $column = $this->parameter('column');
        $table = $this->parameter('table');
        $except = $this->parameter('except');

        if ($except and $except == $value) {
            return true;
        }

        $query = call_user_func('App\Models\\' . $table . '::query');

        return $query->where($column, $value)->count() == 0;
    }
}
