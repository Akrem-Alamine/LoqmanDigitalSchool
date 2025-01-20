<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['title', 'module_id'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}