<?php

namespace App\Models;

use App\Traits\DataTableCommonTrait;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use DataTableCommonTrait;
    protected $fillable = [
        'title',
        'percentage',
        'status',
    ];
}
