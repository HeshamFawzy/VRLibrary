@extends('layouts.app')

@section('content')
<div class="container col-6 card p-4">
	<form method="post" action="{{ route('employee.updateprofile', $employee->id)}}" enctype="multipart/form-data">
	    @csrf
	    <h1 class="text-center">Edit Profile</h1>
	    <div class="form-group">
	        <label for="name" class="h4">Name :</label>
	        <input type="text" class="form-control" name="name" required="" value="{{$employee->name}}" />
	    </div>

	    <div class="form-group">
	        <label for="firstname" class="h4">First Name :</label>
	        <input type="text" class="form-control" name="firstname" required="" value="{{$employee->first_name}}" />
	    </div>

	    <div class="form-group">
	        <label for="lastname" class="h4">Last Name :</label>
	        <input type="text" class="form-control" name="lastname" required="" value="{{$employee->last_name}}" />
	    </div>

	    <div class="form-group">
	        <label for="email" class="h4">Email :</label>
	        <input type="email" class="form-control" name="email" required="" value="{{$employee->email}}" />
	    </div>

	    <div class="form-group">
	        <label for="password" class="h4">Password :</label>
	        <input type="password" class="form-control" name="password" required="" placeholder="New Password" />
	    </div>

	    <div class="form-group">
	        <label for="hiredate" class="h4">Hire Date :</label>
	        <input type="date" class="form-control" name="hiredate" required="" value="{{$employee->hire_date}}" />
	    </div>

	    <div class="form-group">
	        <label for="salary" class="h4">Salary :</label>
	        <input type="number" class="form-control" name="salary" required="" value="{{$employee->salary}}" />
	    </div>

	    <div class="form-group">
	        <label for="phone" class="h4">Phone :</label>
	        <input type="number" class="form-control" name="phone" required="" value="{{$employee->phone}}" />
	    </div>
	   
	    <div class="form-group">
	        <label for="image" class="h4">Image :</label>
	        <input type="file" class="form-control" name="image" accept="image/gif, image/jpeg, image/png" required="" />
	    </div>
	    <div class="form-group">
	        <input type="submit" class="btn btn-primary float-right" name="submit"/>
	    </div>
	   	<a href="{{url('/Employeeindex')}}" class="btn btn-primary col-2 float-left">Back</a>
	</form>
</div>
@endsection
