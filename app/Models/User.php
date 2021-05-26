<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class User extends Model
{
    public function scopeSearch(Builder $query, string $word): Builder
    {
        return $query->where('document', $word)->orWhere('email', $word);
    }
}
