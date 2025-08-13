<?php

namespace App\Models;

use App\Traits\DataTableCommonTrait;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use DataTableCommonTrait;
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
    ];
}
