@extends('layouts.app')

@section('content')
	<div class="container d-flex justify-content-center">
		<div class="bg-light border-right" id="sidebar-wrapper">
	      <div class="list-group list-group-flush">
	        <a href="{{ url('/employees')}}" class="list-group-item list-group-item-action bg-light">Employees</a>
	        <a href="{{ url('/books')}}" class="list-group-item list-group-item-action bg-light">Books</a>
	      </div>
    	</div>
		<div class="card p-2">
		    <div class="row ">
		    	@if($admin ?? '')	
		        <div class="col-md-8 px-3">
		            <div class="card-block px-3">
		            	<input class="form-control" value="{{$admin->id}}" id="id" hidden="">
		            	<p>Welcome :<input type="text" class="form-control" value="{{$admin->name}}" id="name"></p>
		            	<p>First Name :<input type="text" class="form-control" value="{{$admin->first_name}}" id="firstname"></p>
		            	<p>Last Name :<input type="text" class="form-control" value="{{$admin->last_name}}" id="lastname"></p>
		            	<p>Email :<input type="email" class="form-control" value="{{$admin->email}}" id="email"></p>
		            	<p>Password :<input type="password" class="form-control" id="password" placeholder="New Password"></p>
		            	<p>Hire Date :<input type="date" class="form-control" value="{{$admin->hire_date}}" id="hiredate"></p>
		            	<p>Salary :<input type="number" class="form-control" value="{{$admin->salary}}" id="salary"></p>
		            	<p>Phone :<input type="number" class="form-control" value="{{$admin->phone}}" id="phone"></p>
		            </div>
		        </div>
		        <div class="col-md-4">
		            	<img src="{{url('uploads/'.$admin->filename)}}" class="rounded-circle mr-5" style="width: 150px;">
		            	<a class="btn btn-secondary" href="{{ route('admin.editportfolio', $admin->id)}}">Add Profile Picture</a>
		        </div>
		        @endif
		    </div>
		    <div>
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
                    url: '/storeadmin',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN,id:$('#id').val(),firstname:$('#firstname').val(),lastname:$('#lastname').val(),email:$('#email').val(),hiredate:$('#hiredate').val(),salary:$('#salary').val(),phone:$('#phone').val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                    	alert("success");
            			alert(data.firstname);    
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