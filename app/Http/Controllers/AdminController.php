<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use File;
use App\Admin;
use App\User;
use App\Employee;
use App\Book;

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

	public function editportfolio($id)
    {
    	//
        return view('Admin.editprofile', ['id' => $id]);
	}

	 public function updateportfolio(Request $request, $id)
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
        User::where('users.id' , '=' , $request->input('id'))->update([
            'name' => $request->input('firstname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        Admin::where('admins.user_id' , '=' , $request->input('id'))->update([
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'hire_date' => $request->input('hiredate'),
            'salary' => $request->input('salary'),
            'phone' => $request->input('phone'),
        ]);
        
        $response = array(
          'status' => 'success',
          'name' => $request->input('firstname'),
          'first_name' => $request->input('firstname'),
          'last_name' => $request->input('lastname'),
          'email' => $request->input('email'),
          'hire_date' => $request->input('hiredate'),
          'salary' => $request->input('salary'),
          'phone' => $request->input('phone'),
        );

        return response()->json($response);
    }

    public function search(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');

            $data = DB::table('employees')
            ->where('first_name','LIKE', "%{$query}%")
            ->join('users' , 'users.id' , '=' , 'employees.user_id')
            ->get();

            $output = '<ul class="dropdown-menu" style="display:block;position:relative;text-align:center;">';

            foreach($data as $row){
                $output .= '<li><p class="alert-light pl-2 pr-2">'. "Name : " .$row->first_name."   Phone : ".$row->phone. "   Email : " .$row->email. '</p></li>';
            }

            $output .= '</ul>';
            echo $output;
        }
    }

    public function books()
    {
            //
        $books = DB::table('books')
        ->get();

        return view('Admin.books', ['books' => $books]);
    }

    public function editB($id)
    {
        //
        $book = DB::table('books')
        ->where('books.id', '=' , $id)
        ->first();

        return view('Admin.editB', ['book' => $book]);
    }

   
    public function updateB(Request $request, $id)
    {

        Book::where('books.id' , '=' , $id)->update([
            "title"                     => $request->input('title'),
            "auther"                     => $request->input('auther'),
            "publisher"                     => $request->input('publisher'),
            "publishing_date"                     => $request->input('publishingdate'),
            "category"                     => $request->input('category'),
            "edition"                     => $request->input('edition'),
            "pages"                     => $request->input('pages'),
            "no_of_copies"                     => $request->input('noofcopies'),
            "avilable"                     => $request->input('avilable'),
            "shelf_Number"                     => $request->input('shelfNumber'),
        ]);

        

        $books = DB::table('books')
        ->get();

        return view('Admin.books' , ['books' => $books]);
    }

    public function destroyB($id)
    {
        //
        $book = Book::where('id', $id)->first();
        if($book != null){
            $book->delete();
        }

        $books = DB::table('books')
        ->get();

        return view('Admin.books')->with('books' , $books);

    }
}
