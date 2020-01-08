@extends('layouts.app')

@section('content')
	<div class="container d-flex justify-content-center">
		<div class="bg-light border-right" id="sidebar-wrapper">
	      <div class="list-group list-group-flush">
	        <a href="#" class="list-group-item list-group-item-action bg-light">Admins</a>
	        <a href="#" class="list-group-item list-group-item-action bg-light">Employees</a>
	        <a href="#" class="list-group-item list-group-item-action bg-light">Members</a>
	      </div>
    	</div>
		<div class="card p-2">
		    <div class="row ">
		        <div class="col-md-8 px-3">
		            <div class="card-block px-3">
		            	<p>Welcome :<span> {{$admin->name}}</span></p>
		            	<p>Birth Date :<span> {{$admin->birth_date}}</span></p>
		            	<p>Hire Date <span> {{$admin->hire_date}}</span>
		            	<p>Address :<span> {{$admin->address}}</span></p>
		            	<p>Phone :<span> {{$admin->phone}}</span></p>
		            	<p>Salary :<span> {{$admin->salary}}</span></p>
		            </div>
		        </div>
		        <div class="col-md-4">
		            <img src="{{url('uploads/'.$admin->filename)}}" class="rounded-circle" style="width: 150px;">
		        </div>
		    </div>
		    <a class="btn btn-primary" href="{{ route('basicadmin.edit', $admin->id)}}">Edit</a>
      	</div>
	</div>
@endsection