<?php

namespace App\Models;

use App\Traits\DataTableCommonTrait;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use DataTableCommonTrait;
    protected $fillable = [
        'image',
        'title',
        'name',
        'clint',
        'technology',
        'link',
        'status',
    ];
}
