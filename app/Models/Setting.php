<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'site_description',
        'site_keywords',
        'site_logo',
        'site_favicon',
        'contact_email',
        'contact_phone',
        'address',
        'social_links',
        'status',
    ];
}
