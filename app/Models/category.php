<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    protected $table = 'category';
    protected $fillable = [
        'cate_name',
        'cate_slug'
    ];
}

