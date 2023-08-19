<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultSummary extends Model
{
    use HasFactory;
    protected $guarded;

    function results()
    {
        return $this->hasMany(Result::class, 'result_id');
    }

    function term()
    {
        return $this->belongsTo(Term::class);
    }

    function grade()
    {
        return $this->belongsTo(ClassCore::class, 'class_id');
    }

    function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
