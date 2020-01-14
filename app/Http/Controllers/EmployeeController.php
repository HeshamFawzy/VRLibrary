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
}
