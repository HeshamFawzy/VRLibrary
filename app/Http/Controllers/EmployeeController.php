<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use DB;
use App\User;
use App\Employee;
use App\Book;

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

    public function auth(Request $request)
    {
        User::where('users.id' , '=' , $request->input('id'))->update([
            'role' => 'Member',
        ]);
    }

    public function unauth(Request $request)
    {
        User::where('users.id' , '=' , $request->input('id'))->update([
            'role' => '',
        ]);
    }

    public function search(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');

            $data = DB::table('members')
            ->where('first_name','LIKE', "%{$query}%")
            ->join('users' , 'users.id' , '=' , 'members.user_id')
            ->get();

            $output = '<ul class="dropdown-menu" style="display:block;position:relative;text-align:center;">';

            foreach($data as $row){
                $output .= '<li><p class="alert-light pl-2 pr-2">'. "Name : " .$row->first_name."   Phone : ".$row->phone. "   Email : " .$row->email. '</p></li>';
            }

            $output .= '</ul>';
            echo $output;
        }
    }

    public function publisher(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');

            $data = DB::table('books')
            ->where('publisher','LIKE', "%{$query}%")
            ->get();

            $output = '<ul class="dropdown-menu" style="display:block;position:relative;text-align:center;">';

            foreach($data as $row){
                $output .= '<li><p class="alert-light pl-2 pr-2">'. "Avilable : " .$row->available.",   No Of Borrowed : ".$row->pages. ",   No Of Copies : " .$row->no_of_copies. '</p></li>';
            }

            $output .= '<hr></ul>';
            echo $output;
        }
    }

    public function author(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');

            $data = DB::table('books')
            ->where('author','LIKE', "%{$query}%")
            ->get();

            $output = '<ul class="dropdown-menu" style="display:block;position:relative;text-align:center;">';

            foreach($data as $row){
                $output .= '<li><p class="alert-light pl-2 pr-2">'. "Avilable : " .$row->available.",   No Of Borrowed : ".$row->pages. ",   No Of Copies : " .$row->no_of_copies. '</p></li>';
            }

            $output .= '<hr></ul>';
            echo $output;
        }
    }

    public function title(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');

            $data = DB::table('books')
            ->where('title','LIKE', "%{$query}%")
            ->get();

            $output = '<ul class="dropdown-menu" style="display:block;position:relative;text-align:center;">';

            foreach($data as $row){
                $output .= '<li><p class="alert-light pl-2 pr-2">'. "Avilable : " .$row->available.",   No Of Borrowed : ".$row->pages. ",   No Of Copies : " .$row->no_of_copies. '</p></li>';
            }

            $output .= '<hr></ul>';
            echo $output;
        }
    }

}
