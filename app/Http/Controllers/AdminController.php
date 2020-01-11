<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index()
    {
    	//
	    $admin = DB::table('admins')
	   	->where('users.id' , '=' , auth()->user()->id)
	    ->join('users', 'users.id', '=' , 'admins.user_id')->first();

	    return view('Admin.index', ['admin' => $admin]);
	}
}
