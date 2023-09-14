<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $guarded;

    function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    function grade()
    {
        return $this->belongsTo(ClassCore::class, 'class_id');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    function type()
    {
        return $this->belongsTo(ExamType::class, 'type_id');
    }

    function term()
    {
        return $this->belongsTo(Term::class);
    }

    function questions()
    {
        return $this->hasMany(Question::class);
    }
}
