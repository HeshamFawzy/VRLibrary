<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
    //
    public function index()
    {
    	//
	    $employee = DB::table('employees')
	   	->where('users.id' , '=' , auth()->user()->id)
	    ->join('users', 'users.id', '=' , 'employees.user_id')->first();

	    return view('Employee.index', ['employee' => $employee]);
	}

	public function editprofile($id)
    {
        //
        $employee = DB::table('employees')
        ->join('users', 'users.id', '=' , 'employees.user_id')
        ->first();

        return view('employee.editprofile', ['employee' => $employee]);
    }

    /*public function updateportfolio(Request $request, $id)
    {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        Storage::disk('public')->put($image->getFilename().'.'.$extension,  File::get($image));

        BasicAdmin::where('basic_admins.user_id' , '=' , $id)->update([
            "birth_date"            => $request->input('birthdate'),
            "hire_date"             => $request->input('hiredate'),
            "address"               => $request->input('address'),
            "phone"                 => $request->input('phone'),
            "salary"                => $request->input('salary'),
            "mime"                  => $image->getClientMimeType(),
            "original_filename"     => $image->getClientOriginalName(),
            "filename"              => $image->getFilename().'.'.$extension,
        ]);

        $basicadmin = DB::table('basic_admins')
        ->join('users', 'users.id', '=' , 'basic_admins.user_id')
        ->first();
        return view('BasicAdmin.index', ['basicadmin' => $basicadmin]);
    }*/
}
