<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class NoteContent extends Model
{
    use HasFactory;
    protected $guarded;

    public function note()
    {
        return $this->belongsTo(Note::class, 'note_id');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function subject()
    {
        return $this->HasOneThrough(Subject::class, Note::class,'','subject_id' );
    }
}
