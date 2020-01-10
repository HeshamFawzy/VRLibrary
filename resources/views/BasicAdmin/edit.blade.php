@extends('layouts.app')

@section('content')
<div class="row p-1 m-2 d-flex justify-content-center">
	<div class="col-6 card ml-2">
	    <h1 class="text-center">Edit Admin</h1>
	    <div class="form-group">
	        <label for="firstname" class="h4">First Name :</label>
	        <input type="text" class="form-control" name="firstname" id="firstname" value="{{$admin->first_name}}" />
	    </div>

	     <div class="form-group">
	        <label for="lastname" class="h4">Last Name :</label>
	        <input type="text" class="form-control" name="lastname" id="lastname" value="{{$admin->last_name}}"/>
	    </div>

	     <div class="form-group">
	        <label for="email" class="h4">Email :</label>
	        <input type="email" class="form-control" name="email" id="email" value="{{$admin->email}}"/>
	    </div>

	     <div class="form-group">
	        <label for="password" class="h4">Password :</label>
	        <input type="password" class="form-control" name="password" id="password" value="{{$admin->password}}"/>
	    </div>

	    <div class="form-group">
	        <label for="hiredate" class="h4">Hire Date :</label>
	        <input type="date" class="form-control" name="hiredate" id="hiredate" value="{{$admin->hire_date}}"/>
	    </div>

	     <div class="form-group">
	        <label for="salary" class="h4">Salary :</label>
	        <input type="number" class="form-control" name="salary" id="salary" value="{{$admin->salary}}"/>
	    </div>
	    <div class="form-group">
	        <button class="btn btn-primary float-right" id="save" name="save">Save</button>
	        <a href="{{url('/index')}}" class="btn btn-primary">Back</a>
	    </div>
	</div>
</div>
@endsection