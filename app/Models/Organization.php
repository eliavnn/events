<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Organization extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected function mainImagePath(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->main_image) {
                    return null;
                }

                return Storage::url($this->main_image);
            },
        );
    }

    protected function logoPath(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->logo) {
                    return null;
                }

                return Storage::url($this->logo);
            }
        );
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

    protected $appends = [
        'main_image_path',
        'logo_path',
    ];
}
