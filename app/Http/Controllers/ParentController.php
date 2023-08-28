<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ParentController extends Controller
{
    function parentIndex()
    {
        $guardians = Guardian::orderby('id', 'desc')->paginate(25);
        return view('admin.register_guardian', compact('guardians'));
    }


    function createGuardianProfile(Request $request)
    {
        Validator::make($request->all(), [
            'guardian_name' => 'required|min:6',
            'guardian_phone' => 'required',
            'guardian_email' => 'required|email|unique:guardians,guardian_email',
            'guardian_address' => 'required'
        ])->validate();

        Guardian::create([
            'guardian_name' => $request->guardian_name,
            'guardian_phone' => $request->guardian_phone,
            'guardian_email' => $request->guardian_email,
            'guardian_address' => $request->guardian_address,
            'password' => Hash::make(trim($request->phone)),
            'mother_name' => $request->mother_name,
            'mother_email' => $request->mother_email,
            'mother_address' => $request->mother_address,
            'mother_phone' => $request->mother_phone,
            'mother_occupation' => $request->mother_occupation,
            'mother_office_address' => $request->mother_office_address,
            'father_name' => $request->father_name,
            'father_email' => $request->father_email,
            'father_address' => $request->father_address,
            'father_phone' => $request->father_phone,
            'father_occupation' => $request->father_occupation,
            'father_office_address' => $request->father_office_address,
            'state' => $request->state,
            'lga' => $request->lga,
        ]);
        return back()->with('success', 'Guardian profile has been created');
    }


    function guardianLogin(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|exists:guardians,guardian_email',
            'password' => 'required|string|min:3'
        ])->validate();

        $guardian = Guardian::where(['guardian_email' => $request->email, 'guardian_phone' => $request->password])->first();

        if(!$guardian) {
            return back()->with('error', 'Invalid login detials');
        }

        $ath = Auth::guard('guardian')->login($guardian);

        return redirect('/guardian/')->with('success', 'Welcome back');
    }




    // after login functions
    function guardian()
    {
        return Auth::guard('guardian')->user();
    }

    function parentDashboardIndex()
    {

        return view('parent.index');
    }

}
