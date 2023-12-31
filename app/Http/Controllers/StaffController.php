<?php

namespace App\Http\Controllers;

use App\Models\ClassCore;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    function staffProfileIndex($staff_id)
    {
        if (auth()->user()->role == 'administrator') {
            $staff = User::findOrFail($staff_id);
        } else {
            $staff = User::findOrFail(auth()->user()->id);
        }
        $class_teacher = ClassCore::withCount('students')->where(['class_teacher' => $staff->id])->first();
        return view('admin.staff-profile', compact(['staff', 'class_teacher']));
    }

    function addStaffIndex()
    {
        return view('admin.create_staff_profile');
    }

    function permissionIndex()
    {
        return view('admin.staff_permission');
    }

    function staffListIndex()
    {
        $staffs = User::where('id', '>', 1)->paginate(20);
        return view('admin.staff', compact('staffs'));
    }

    function createStaffProfile(Request $request)
    {
        $val = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string',
            'address' => 'required|string',
        ])->validate();


        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $photo_name = 'assets/images/staff/' . $request->phone . '_' . time() . rand() . '.' . $img->getClientOriginalExtension();
            move_uploaded_file($img, $photo_name);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(trim($request->phone)),
            'role' => strtolower($request->role),
            'phone' => $request->phone,
            'address' => $request->address,
            'institution' => $request->institution,
            'degree' => $request->degree,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'date_of_birth' => $request->dob,
            'photo' => $photo_name ?? 'assets/images/staff/user.png',
        ]);

        $this->createPermission($user->id, $user->role);

        return back()->with('success', 'Staff-Profile has been created!!');
    }


    function createPermission($user_id, $role)
    {
        $check_permission = Permission::where(['user_id' => $user_id])->count();
        if ($check_permission > 0) {
            return;
        } // stops function if user already has permmison
        if ($role == 'administrator') {
            Permission::create([
                'user_id' => $user_id,
                'fee' => 1,
                'registration' => 1,
                'other' => 1
            ]);
        } elseif ($role == 'bursar') {
            Permission::create([
                'user_id' => $user_id,
                'fee' => 1,
                'registration' => 0,
                'other' => 0
            ]);
        } else {
            Permission::create([
                'user_id' => $user_id
            ]);
        }
        return;
    }

    function fetchUserPermission()
    {
        $users = User::with(['permission'])->where('id', '>', 1)->paginate(200);
        return response([
            'data' => $users
        ], 200);
    }

    function updatePermissionAll(Request $request)
    {
        $val = Validator::make($request->all(), [
            'data' => 'required',
        ]);
        if ($val->fails()) {
            return response(['errors' => $val->errors()->all()], 422);
        }
        $permssions = $request->data;
        return $permssions;
        foreach ($permssions as $per) {
            Permission::where('id', 1)->update([
                'sms' => $per['result'] ?? 0,
                'bill' => $per['fee'] ?? 0,
                'student' => $per['registration'] ?? 0,
            ]);
        }
        return response([
            'message' => count($permssions) . ' users permissions updated sucesffullly'
        ], 200);
    }
}
