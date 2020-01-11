<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use File;
use App\Admin;

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

	public function editprofile($id)
    {
    	//
        return view('Admin.editprofile', ['id' => $id]);
	}

	 public function updateprofile(Request $request, $id)
    {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        Storage::disk('public')->put($image->getFilename().'.'.$extension,  File::get($image));

        Admin::where('admins.user_id' , '=' , $id)->update([
            "mime"                  => $image->getClientMimeType(),
            "original_filename"     => $image->getClientOriginalName(),
            "filename"              => $image->getFilename().'.'.$extension,
        ]);

        $admin = DB::table('admins')
        ->join('users', 'users.id', '=' , 'admins.user_id')
        ->first();
        
        return view('Admin.index', ['admin' => $admin]);
    }

    public function storeadmin(Request $request)
    {
        /*User::where('users.id' , '=' , $request->input('id'))->update([
            'name' => $request->input('firstname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);*/

        /*Admin::where('admins.user_id' , '=' , $request->input('id'))->update([
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'hire_date' => $request->input('hiredate'),
            'salary' => $request->input('salary'),
            'phone' => $request->input('phone'),
        ]);*/
        
        if($request->ajax()){
            dd($request);
        }

       /*$response = array(
          'status' => 'success',
          'name' => $request->input('firstname'),
          'first_name' => $request->input('firstname'),
          'last_name' => $request->input('lastname'),
          'email' => $request->input('email'),
          'hire_date' => $request->input('hiredate'),
          'salary' => $request->input('salary'),
          'phone' => $request->input('phone'),
        );*/
        //return response()->json($request->input('id'));
    }
}