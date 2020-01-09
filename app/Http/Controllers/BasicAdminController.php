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
        $basicadmin = DB::table('basic_admins')
        ->join('users', 'users.id', '=' , 'basic_admins.user_id')
        ->first();

        return view('BasicAdmin.index', ['basicadmin' => $basicadmin]);
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

        $adminuser = User::create([
            'name' => $request->input('firstname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $admin = Admin::create([
            'user_id' => $adminuser->id,
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'hire_date' => $request->input('hiredate'),
            'salary' => $request->input('salary'),
        ]);
       
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

        $basicadmin = DB::table('basic_admins')
        ->join('users', 'users.id', '=' , 'basic_admins.user_id')
        ->first();
        return view('BasicAdmin.index', ['basicadmin' => $basicadmin]);
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
        $admin = User::find($id);
        $admin->delete();

        $admins = DB::table('admins')
        ->join('users', 'users.id', '=' , 'admins.user_id')
        ->get();

        return view('BasicAdmin.admins')->with('admins' , $admins);

    }



    public function Admins()
    {
        $admins = DB::table('admins')
        ->join('users', 'users.id', '=' , 'admins.user_id')
        ->get();

        return view('BasicAdmin.admins')->with('admins' , $admins);
    }


    public function Start()
    {
        $BasicAdminUser = User::create([
            'name' => 'Admin',
            'email' => 'Admin@Admin.com',
            'password' => bcrypt('123456Aa_'),
        ]);

        $BasicAdmin = BasicAdmin::create([
            'user_id' =>   $BasicAdminUser->id,
        ]);

        return("ok");
    }

}
