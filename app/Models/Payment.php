<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded;

    function fee_cat()
    {
        return $this->belongsTo(FeeCategory::class, 'fe_id');
    }

    function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
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
