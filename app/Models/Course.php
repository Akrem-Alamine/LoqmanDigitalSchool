<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'teacher',
        'category',
        'level',
        'direction',
        'price',
        'description',
        'image'
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}