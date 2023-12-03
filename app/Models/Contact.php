<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'user_id',
        'zip_code',
        'street',
        'st_number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'note',
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
