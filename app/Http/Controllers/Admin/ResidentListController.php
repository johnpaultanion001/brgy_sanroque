<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class ResidentListController extends Controller
{
    public function index()
    {
       
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            $residents = User::where('role', 'resident')->latest()->get();
            return view('admin.residentlist', compact('residents'));
        }
        return abort('403');
    }

    public function edit(User $user)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $user]);
        }
    }

    public function update(Request $request, User $user)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required'],
            'contact_number' => ['required', 'string', 'min:8','max:11'],
            'date_of_birth' => ['required', 'date' , 'before:today'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find($user->id)->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'contact_number' => $request->input('contact_number'),
            'date_of_birth' => $request->input('date_of_birth'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    
      
    }

    public function defaultPassowrd(User $user)
    {
        User::find($user->id)->update([
            'password' => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' , //password,
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function destroy(User $user)
    {
        $user->brgy_certificate()->delete();
        $user->brgy_health_certificate()->delete();
        $user->brgy_health_indigency()->delete();
        $user->appointments()->delete();
        $user->delete();
        return response()->json(['success' => 'Updated Successfully.']);
    }
}
