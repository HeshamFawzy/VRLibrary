@extends('layouts.app')

@section('content')
<div class="row p-1 m-2 d-flex justify-content-center">
	<div class="col-10 p-2" style="background-color: white;">
  <h1 class="text-center">Members</h1>
  @if(auth()->user()->role == 'BasicAdmin')
    <a href="{{ route('basicadmin.index')}}" class="btn btn-primary float-right">Back</a>
  @elseif(auth()->user()->role == 'Employee')
    <a href="{{ route('employee.index')}}" class="btn btn-primary float-right">Back</a>
    <div class="form-group">
      <input type="text" name="firstname" id="firstname" class="col-4 form-control" placeholder="Search By Member First Name">
      <div id="names"></div>
    </div>
    {{ csrf_field() }}
  @endif
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
        @if(auth()->user()->role == 'Employee')
        <td>
          <button href="" class="btn" style="background-color: green;" id="Auth" value="{{$member->id}}">Authenticate</button>
        </td>
        @endif
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

<script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

              $("#Auth").click(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/auth',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, id:$(this).val()},
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                      $('#Auth').html('UnAuthenticate');
                      $('#Auth').css('background-color','red');
                    },
                    error: function(xhr, status, error) {
                      console.log(xhr);
                      if (xhr == 'undefined' || xhr == undefined) {
                          alert('undefined');
                      } else {
                          alert('object is there');
                      }
                      alert(status);
                      alert(error);
                    }
                });
              });

              $("#Auth").dblclick(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/unauth',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, id:$(this).val()},
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                      $('#Auth').html('Authenticate');
                      $('#Auth').css('background-color','green');
                    },
                    error: function(xhr, status, error) {
                      console.log(xhr);
                      if (xhr == 'undefined' || xhr == undefined) {
                          alert('undefined');
                      } else {
                          alert('object is there');
                      }
                      alert(status);
                      alert(error);
                    }
                }); 
              });

        });    
</script>

<script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#firstname").keyup(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/search',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, query:$(this).val()},
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                      $('#names').fadeIn();
                      $('#names').html(data);
                    },
                    error: function(xhr, status, error) {
                      console.log(xhr);
                      if (xhr == 'undefined' || xhr == undefined) {
                          alert('undefined');
                      } else {
                          alert('object is there');
                      }
                      alert(status);
                      alert(error);
                    }
                });
            });
       });    
</script>


@endsection
