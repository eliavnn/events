<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'name',
        'description',
        'logo',
        'main_image',
        'website',
        'contact_phone',
        'contact_email',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'user_id',
    ];
}
