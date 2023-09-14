<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasFactory;
    protected $guarded;

    function parent()
    {
        return $this->belongsTo(Guardian::class, 'parent_id');
    }

    function grade()
    {
        return $this->belongsTo(ClassCore::class, 'class_id');
    }

    function arm()
    {
        return $this->belongsTo(ClassArm::class);
    }
}
