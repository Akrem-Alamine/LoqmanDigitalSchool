<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['title', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}