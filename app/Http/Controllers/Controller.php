<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function currentTerm()
    {
        return Term::with('session')->where(['status' => 1])->first();
    }
}
