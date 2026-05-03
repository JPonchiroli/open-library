<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['book_id, loan_date, return_date'])]
class Loans extends Model
{
    use HasFactory;

    public function book(): BelongsTo
    {
        return $this->belongsTo(Books::class);
    }
}
