@extends('layouts.app')

@section('content')
	<div class="container d-flex justify-content-center">
		<div class="bg-light border-right" id="sidebar-wrapper">
	      <div class="list-group list-group-flush">
	        <a href="{{ url('employees')}}" class="list-group-item list-group-item-action bg-light">Employees</a>
	      </div>
    	</div>
		<div class="card p-2">
		    <div class="row ">
		    	@if($admin ?? '')	
		        <div class="col-md-8 px-3">
		            <div class="card-block px-3">
		            	<p>Welcome :<span> {{$admin->name}}</span></p>
		            	<p>First Name :<span> {{$admin->first_name}}</span></p>
		            	<p>Last Name :<span> {{$admin->last_name}}</span></p>
		            	<p>Email :<span> {{$admin->email}}</span></p>
		            	<p>Hire Date :<span> {{$admin->hire_date}}</span></p>
		            	<p>Salary :<span> {{$admin->salary}}</span></p>
		            	<p>Phone :<span> {{$admin->phone}}</span></p>
		            </div>
		        </div>
		        <div class="col-md-4">
		            	<img src="{{url('uploads/'.$admin->filename)}}" class="rounded-circle mr-5" style="width: 150px;">
		            	<a class="btn btn-secondary" href="{{ route('admin.editprofile', $admin->id)}}">Add Profile Picture</a>
		        </div>
		        @endif
		    </div>
      	</div>
	</div>
@endsection