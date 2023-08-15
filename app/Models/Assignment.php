<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $guarded;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function grade()
    {
        return $this->belongsTo(ClassCore::class, 'class_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    function term()
    {
        return $this->belongsTo(Term::class);
    }
}
