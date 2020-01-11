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
		            	<p>Welcome :<input class="form-control" value="{{$admin->name}}" id="name" disabled=""></p>
		            	<p>First Name :<input class="form-control" value="{{$admin->first_name}}" id="firstname" disabled=""></p>
		            	<p>Last Name :<input class="form-control" value="{{$admin->last_name}}" id="lastname" disabled=""></p>
		            	<p>Email :<input class="form-control" value="{{$admin->email}}" id="email" disabled=""></p>
		            	<p>Hire Date :<input class="form-control" value="{{$admin->hire_date}}" id="hiredate" disabled=""></p>
		            	<p>Salary :<input class="form-control" value="{{$admin->salary}}" id="salary" disabled=""></p>
		            	<p>Phone :<input class="form-control" value="{{$admin->phone}}" id="phone" disabled=""></p>
		            </div>
		        </div>
		        <div class="col-md-4">
		            	<img src="{{url('uploads/'.$admin->filename)}}" class="rounded-circle mr-5" style="width: 150px;">
		            	<a class="btn btn-secondary" href="{{ route('admin.editprofile', $admin->id)}}">Add Profile Picture</a>
		        </div>
		        @endif
		    </div>
		    <div id="Edit">
		     <button class="btn btn-primary float-right" id="save" name="save">Edit</button>
		    </div>
      	</div>
	</div>
	<script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#save").click(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/store',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, firstname:$('#firstname').val(),lastname:$('#lastname').val(),email:$('#email').val(),password:$('#password').val(),hiredate:$('#hiredate').val(),salary:$('#salary').val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                    	var html = '<tr>' + 
                    	'<td>' + data.first_name + '</td>' + 
                    	'<td>' + data.last_name + '</td>' + 
                    	'<td>' + data.email + '</td>' + 
                    	'<td>' + data.hire_date + '</td>' + 
                    	'<td>' + data.salary + '</td>' +            
      					'</tr>';
                    	$('#table').append(html);
                    }
                }); 
            });
       });    
</script>
@endsection