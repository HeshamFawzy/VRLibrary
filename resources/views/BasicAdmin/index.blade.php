@extends('layouts.app')

@section('content')
	<div class="container d-flex justify-content-center">
		<div class="bg-light border-right" id="sidebar-wrapper">
	      <div class="list-group list-group-flush">
	        <a href="{{ url('admins')}}" class="list-group-item list-group-item-action bg-light">Admins</a>
	        <a href="#" class="list-group-item list-group-item-action bg-light">Employees</a>
	        <a href="#" class="list-group-item list-group-item-action bg-light">Members</a>
	      </div>
    	</div>
		<div class="card p-2">
		    <div class="row ">
		    	@if($basicadmin ?? '')	
		        <div class="col-md-8 px-3">
		            <div class="card-block px-3">
		            	<p>Welcome :<span> {{$basicadmin->name}}</span></p>
		            	<p>Birth Date :<span> {{$basicadmin->birth_date}}</span></p>
		            	<p>Hire Date <span> {{$basicadmin->hire_date}}</span>
		            	<p>Address :<span> {{$basicadmin->address}}</span></p>
		            	<p>Phone :<span> {{$basicadmin->phone}}</span></p>
		            	<p>Salary :<span> {{$basicadmin->salary}}</span></p>
		            </div>
		        </div>
		        <div class="col-md-4">
		            	<img src="{{url('uploads/'.$basicadmin->filename)}}" class="rounded-circle mr-5" style="width: 150px;">
		        </div>
		        @endif
		    </div>
		    <a class="btn btn-primary" href="{{ route('basicadmin.editportfolio', $basicadmin->id)}}">Edit</a>
      	</div>
	</div>
@endsection