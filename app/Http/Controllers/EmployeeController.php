<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use DB;
use App\User;
use App\Employee;

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

    public function updateprofile(Request $request, $id)
    {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        Storage::disk('public')->put($image->getFilename().'.'.$extension,  File::get($image));

        User::where('users.id' , '=' , $id)->update([
        	"name"						=> $request->input('name'),
            "email"                     => $request->input('email'),
            "password"                  => bcrypt($request->input('password')),
        ]);

        Employee::where('employees.user_id' , '=' , $id)->update([
            "first_name"            => $request->input('firstname'),
            "last_name"            => $request->input('lastname'),
            "hire_date"            => $request->input('hiredate'),
            "salary"            => $request->input('salary'),
            "phone"            => $request->input('phone'),
            "mime"                  => $image->getClientMimeType(),
            "original_filename"     => $image->getClientOriginalName(),
            "filename"              => $image->getFilename().'.'.$extension,
        ]);

        $employee = DB::table('employees')
        ->join('users', 'users.id', '=' , 'employees.user_id')
        ->first();
        return view('Employee.index', ['employee' => $employee]);
    }
}
