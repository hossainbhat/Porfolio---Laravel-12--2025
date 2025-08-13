<?php

namespace App\Models;

use App\Traits\DataTableCommonTrait;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use DataTableCommonTrait;
    protected $fillable = [
        'title',
        'description',
        'year',
        'status',
    ];
}
