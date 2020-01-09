<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use File;
use App\BasicAdmin;
use App\Admin;
use App\User;

class BasicAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admin = DB::table('basic_admins')
        ->join('users', 'users.id', '=' , 'basic_admins.user_id')
        ->first();
        return view('BasicAdmin.index', ['admin' => $admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $adminuser = new User();

        $adminuser->name = $request->input('firstname');
        $adminuser->email = $request->input('email');
        $adminuser->password = bcrypt($request->input('password'));

        $adminuser->save();

        $admin_id = DB::table('users')
        -select('id')
        ->last();

        $admin = new Admin();

        $admin->user_id = $admin_id;
        $admin->hire_date = $request->input('hiredate');
        $admin->salary = $request->input('salary');

        $admin->save();
       
        return response()->json($admin);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admin = DB::table('basic_admins')
        ->join('users', 'users.id', '=' , 'basic_admins.user_id')
        ->first();
        return view('BasicAdmin.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        $admin = DB::table('basic_admins')
        ->join('users', 'users.id', '=' , 'basic_admins.user_id')
        ->first();
        return view('BasicAdmin.index', ['admin' => $admin]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function Admins()
    {
        $admins = DB::table('admins')
        ->join('users', 'users.id', '=' , 'admins.user_id')
        ->get();
        return view('BasicAdmin.admins')->with('admins' , $admins);
    }

}
