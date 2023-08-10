<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCore extends Model
{
    use HasFactory;
    protected $guarded;

    function category() 
    {
        return $this->belongsTo(ClassCategory::class);
    }

    function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    
}
