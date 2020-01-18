@extends('layouts.app')

@section('content')
<div class="container col-6 card p-4">
	<form method="post" action="{{ route('basicadmin.updateport', $admin->id)}}" enctype="multipart/form-data">
	    @csrf
	    <h1 class="text-center">Edit Profile</h1>
	    <div class="form-group">
	        <label for="name" class="h4">Name :</label>
	        <input type="text" class="form-control" name="name" required="" value="{{$admin->name}}" disabled="" />
	    </div>

	    <div class="form-group">
	        <label for="birthdate" class="h4">Birth Date :</label>
	        <input type="date" class="form-control" name="birthdate" required="" value="{{$admin->birth_date}}" />
	    </div>

	    <div class="form-group">
	        <label for="hiredate" class="h4">Hire Date :</label>
	        <input type="date" class="form-control" name="hiredate" required="" value="{{$admin->hire_date}}" />
	    </div>

	     <div class="form-group">
	        <label for="address" class="h4">Address :</label>
	        <input type="text" class="form-control" name="address" required="" value="{{$admin->address}}" />
	    </div>

	     <div class="form-group">
	        <label for="phone" class="h4">Phone :</label>
	        <input type="number" class="form-control" name="phone" required="" value="{{$admin->phone}}" />
	    </div>

	     <div class="form-group">
	        <label for="salary" class="h4">Salary :</label>
	        <input type="number" class="form-control" name="salary" required="" value="{{$admin->salary}}" />
	    </div>
	   
	    <div class="form-group">
	        <label for="image" class="h4">Image :</label>
	        <input type="file" class="form-control" name="image" accept="image/gif, image/jpeg, image/png" required="" />
	    </div>
	    <div class="form-group">
	        <input type="submit" class="btn btn-primary float-right" name="submit"/>
	    </div>
	    <a href="{{url('/Basicindex')}}" class="btn btn-primary col-2 float-left">Back</a>
	</form>
</div>
@endsection
