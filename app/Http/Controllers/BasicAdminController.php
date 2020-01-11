<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use File;
use App\BasicAdmin;
use App\Admin;
use App\User;
use App\Employee;
use App\Member;

class BasicAdminController extends Controller
{
    //start
    public function Start()
    {
        $BasicAdminUser = User::create([
            'name' => 'BasicAdmin',
            'email' => 'Admin@Admin.com',
            'password' => bcrypt('123456Aa_'),
        ]);

        $BasicAdmin = BasicAdmin::create([
            'user_id' =>   $BasicAdminUser->id,
        ]);

        return view('public.start')->with('BasicAdminUser' , $BasicAdminUser);
    }


    //portfolio
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function index()
    {
        //
        $basicadmin = DB::table('basic_admins')
        ->join('users', 'users.id', '=' , 'basic_admins.user_id')
        ->first();

        return view('BasicAdmin.index', ['basicadmin' => $basicadmin]);
    }

    public function editportfolio($id)
    {
        //
        $admin = DB::table('basic_admins')
        ->join('users', 'users.id', '=' , 'basic_admins.user_id')
        ->first();
        return view('BasicAdmin.editportfolio', ['admin' => $admin]);
    }

    public function updateportfolio(Request $request, $id)
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
    ////////////////////////////////////////////////////////////////////////////////////////////

    //Admins
    public function Admins()
    {
        $admins = DB::table('admins')
        ->join('users', 'users.id', '=' , 'admins.user_id')
        ->get();

        return view('BasicAdmin.admins')->with('admins' , $admins);
    }

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

       
       $response = array(
          'status' => 'success',
          'first_name' => $request->input('firstname'),
          'last_name' => $request->input('lastname'),
          'email' => $request->input('email'),
          'hire_date' => $request->input('hiredate'),
          'salary' => $request->input('salary'),
        );
        return response()->json($response);
    }

    public function edit($id)
    {
        //
        $admin = DB::table('admins')
        ->where('admins.user_id', '=' , $id)
        ->join('users' , 'users.id', '=' , 'admins.user_id')
        ->first();

        return view('BasicAdmin.edit', ['admin' => $admin]);
    }

   
    public function update(Request $request, $id)
    {

        User::where('users.id' , '=' , $id)->update([
            "email"                     => $request->input('email'),
            "password"                  => bcrypt($request->input('password')),
        ]);

        Admin::where('admins.user_id' , '=' , $id)->update([
            "first_name"                => $request->input('firstname'),
            "last_name"                 => $request->input('lastname'),
            "hire_date"                 => $request->input('hiredate'),
            "salary"                    => $request->input('salary'),
            "phone"                     => $request->input('phone'),
        ]);

        $admins = DB::table('admins')
        ->join('users', 'users.id', '=' , 'admins.user_id')
        ->get();

        return view('BasicAdmin.admins' , ['admins' => $admins]);
    }
      
    public function destroy($id)
    {
        //
        $admin = User::where('id', $id)->first();
        if($admin != null){
            $admin->delete();
        }

        $admins = DB::table('admins')
        ->join('users', 'users.id', '=' , 'admins.user_id')
        ->get();

        return view('BasicAdmin.admins')->with('admins' , $admins);

    }
    ////////////////////////////////////////////////////////////////////////////////////////////

    //Employees
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function Employees()
    {
        $employees = DB::table('employees')
        ->join('users', 'users.id', '=' , 'employees.user_id')
        ->get();

        return view('BasicAdmin.employees')->with('employees' , $employees);
    }

    public function editE($id)
    {
        //
        $employee = DB::table('employees')
        ->where('employees.user_id', '=' , $id)
        ->join('users' , 'users.id', '=' , 'employees.user_id')
        ->first();

        return view('BasicAdmin.editE', ['employee' => $employee]);
    }

    public function updateE(Request $request, $id)
    {

        User::where('users.id' , '=' , $id)->update([
            "email"                     => $request->input('email'),
            "password"                  => bcrypt($request->input('password')),
        ]);

        Employee::where('employees.user_id' , '=' , $id)->update([
            "first_name"                => $request->input('firstname'),
            "last_name"                 => $request->input('lastname'),
            "hire_date"                 => $request->input('hiredate'),
            "salary"                    => $request->input('salary'),
            "phone"                     => $request->input('phone'),
        ]);

        $employees = DB::table('employees')
        ->join('users', 'users.id', '=' , 'employees.user_id')
        ->get();

        return view('BasicAdmin.employees' , ['employees' => $employees]);
    }

     public function destroyE($id)
    {
        //
        $employee = User::where('id', $id)->first();
        if($employee != null){
            $employee->delete();
        }

        $employees = DB::table('employees')
        ->join('users', 'users.id', '=' , 'employees.user_id')
        ->get();

        return view('BasicAdmin.employees')->with('employees' , $employees);

    }
    /////////////////////////////////////////////////////////////////////////////////////////////

    //Members
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function Members()
    {
        $members = DB::table('members')
        ->join('users', 'users.id', '=' , 'members.user_id')
        ->get();

        return view('BasicAdmin.members')->with('members' , $members);
    }

    public function editM($id)
    {
        //
        $member = DB::table('members')
        ->where('members.user_id', '=' , $id)
        ->join('users' , 'users.id', '=' , 'members.user_id')
        ->first();

        return view('BasicAdmin.editM', ['member' => $member]);
    }

    public function updateM(Request $request, $id)
    {

        User::where('users.id' , '=' , $id)->update([
            "email"                     => $request->input('email'),
            "password"                  => bcrypt($request->input('password')),
        ]);

        Member::where('members.user_id' , '=' , $id)->update([
            "first_name"                => $request->input('firstname'),
            "last_name"                 => $request->input('lastname'),
            "hire_date"                 => $request->input('hiredate'),
            "salary"                    => $request->input('salary'),
            "phone"                     => $request->input('phone'),
        ]);

        $members = DB::table('members')
        ->join('users', 'users.id', '=' , 'members.user_id')
        ->get();

        return view('BasicAdmin.members' , ['members' => $members]);
    }

    public function destroyM($id)
    {
        //
        $member = User::where('id', $id)->first();
        if($member != null){
            $member->delete();
        }

        $members = DB::table('members')
        ->join('users', 'users.id', '=' , 'members.user_id')
        ->get();

        return view('BasicAdmin.members')->with('members' , $members);

    }
    ////////////////////////////////////////////////////////////////////////////////////////////
}
