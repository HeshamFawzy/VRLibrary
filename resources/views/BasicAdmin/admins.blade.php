@extends('layouts.app')

@section('content')
<div class="row p-1 m-2 d-flex justify-content-center">
	<div class="col-3 card ml-2">
	    <h1 class="text-center">Create Admin</h1>
	    <div class="form-group">
	        <label for="firstname" class="h4">First Name :</label>
	        <input type="text" class="form-control" name="firstname" id="firstname" />
	    </div>

	     <div class="form-group">
	        <label for="lastname" class="h4">Last Name :</label>
	        <input type="text" class="form-control" name="lastname" id="lastname" />
	    </div>

	     <div class="form-group">
	        <label for="email" class="h4">Email :</label>
	        <input type="email" class="form-control" name="email" id="email"/>
	    </div>

	     <div class="form-group">
	        <label for="password" class="h4">Password :</label>
	        <input type="password" class="form-control" name="password" id="password"/>
	    </div>

	    <div class="form-group">
	        <label for="hiredate" class="h4">Hire Date :</label>
	        <input type="date" class="form-control" name="hiredate" id="hiredate"/>
	    </div>

	     <div class="form-group">
	        <label for="salary" class="h4">Salary :</label>
	        <input type="number" class="form-control" name="salary" id="salary"/>
	    </div>
	    <div class="form-group">
	        <button class="btn btn-primary float-right" id="save" name="save">Save</button>
	        <a href="{{url('/index')}}" class="btn btn-primary">Back</a>
	    </div>
	</div>

	<div class="col-8 p-2" style="background-color: white;">
	<table class="table table-hover">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Hire Date</th>
      <th>Salary</th>
      <th>Phone</th>
      <th colspan="2">Modify</th>
    </tr>
  </thead>
  <tbody id="table">
  	@if(count($admins) > 0)
	@foreach($admins as $admin)
    <tr>
				<td>{{$admin->first_name}}</td>
				<td>{{$admin->last_name}}</td>
				<td>{{$admin->email}}</td>
				<td>{{$admin->hire_date}}</td>
				<td>{{$admin->salary}}</td>
				<td>{{$admin->phone}}</td>
				<td>
					<a href="#" class="btn btn-success">Edit</a>
					<a href="{{ url('/destroy' , $admin->id)}}" class="btn btn-danger" name="delete">Delete</a>
				</td>
    </tr>
    @endforeach
	@endif
  </tbody>
</table>
<div>
</div>
<br>
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
