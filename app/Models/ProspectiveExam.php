<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProspectiveExam extends Model
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
}
