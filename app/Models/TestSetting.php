<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSetting extends Model
{
    use HasFactory;
    protected $guarded;

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

}
