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

    public function getFormattedAddress(): string
    {
        $address = '';
        $address = ($this->street ? $this->street : '');
        $address = $address . ($this->st_number ? ', ' . $this->st_number : '');
        $address = $address . ($this->neighborhood ? ' - ' . $this->neighborhood : '');
        $address = $address . ($this->city ? ', ' . $this->city : '');
        $address = $address . ($this->state ? ' - ' . $this->state : '');


        return $address;
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
