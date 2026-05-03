<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['title, author, isbn, available_copies'])]
class Books extends Model
{
    use HasFactory;

    public function loans(): HasMany
    {
        return $this->hasMany(Loans::class);
    }
}
