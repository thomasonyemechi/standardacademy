<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Guardian extends Authenticatable
{
    use HasFactory;
    protected $guard = 'guardian';

    protected $guarded;



    public function getAuthPassword()
    {
        return $this->guardian_phone;
    }
}
