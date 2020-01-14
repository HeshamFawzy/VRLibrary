@extends('layouts.app')

@section('content')
	<div class="container d-flex justify-content-center">
		<div class="bg-light border-right" id="sidebar-wrapper">
	      <div class="list-group list-group-flush">

	      </div>
    	</div>
		<div class="card p-2">
		    <div class="row ">
		    	@if($employee ?? '')	
		        <div class="col-md-8 px-3">
		            <div class="card-block px-3">
		            	<p>Welcome :<span> {{$employee->name}}</span></p>
		            	<p>First Name :<span> {{$employee->first_name}}</span></p>
		            	<p>Last Name <span> {{$employee->last_name}}</span>
		            	<p>Email :<span> {{$employee->email}}</span></p>
		            	<p>Hire Date :<span> {{$employee->hire_date}}</span></p>
		            	<p>Salary :<span> {{$employee->salary}}</span></p>
		            	<p>Phone :<span> {{$employee->phone}}</span></p>
		            </div>
		        </div>
		        <div class="col-md-4">
		            	<img src="{{url('uploads/'.$employee->filename)}}" class="rounded-circle mr-5" style="width: 150px;">
		        </div>
		        @endif
		    </div>
      	</div>
	</div>
@endsection