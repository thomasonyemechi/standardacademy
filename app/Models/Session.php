<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $guarded;

    function terms()
    {
        return $this->hasMany(Term::class, 'session_id');
    }
}
