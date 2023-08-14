<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $guarded;

    function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    function grade()
    {
        return $this->belongsTo(ClassCore::class, 'class_id');
    }

    function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }
    
    function contents()
    {
        return $this->hasMany(NoteContent::class);
    }
}
