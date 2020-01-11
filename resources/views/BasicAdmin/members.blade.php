@extends('layouts.app')

@section('content')
<div class="row p-1 m-2 d-flex justify-content-center">
	<div class="col-8 p-2" style="background-color: white;">
	<h1 class="text-center">Members</h1>
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
  	@if(count($members) > 0)
	@foreach($members as $member)
    <tr>
				<td>{{$member->first_name}}</td>
				<td>{{$member->last_name}}</td>
				<td>{{$member->email}}</td>
				<td>{{$member->hire_date}}</td>
				<td>{{$member->salary}}</td>
				<td>{{$member->phone}}</td>
				<td>
					<a href="{{ url('/editM' , $member->id)}}" class="btn btn-success">Edit</a>
					<a href="{{ url('/destroyM' , $member->id)}}" class="btn btn-danger" name="delete">Delete</a>
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
