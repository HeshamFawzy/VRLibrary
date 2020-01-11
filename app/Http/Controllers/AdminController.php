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
}
