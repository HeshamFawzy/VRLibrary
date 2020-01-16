@extends('layouts.app')

@section('content')
<div class="row p-1 m-2 d-flex justify-content-center">
	<div class="col-12 p-2" style="background-color: white;">
  @if(auth()->user()->role == 'Admin')
      <a href="{{ route('admin.index')}}" class="btn btn-primary">Back</a>
  @elseif(auth()->user()->role == 'Employee')
      <a href="{{ route('employee.index')}}" class="btn btn-primary float-right">Back</a>
    <div>
      <div class="form-group">
        <input type="text" name="publisher" id="publisher" class="col-4 form-control d-inline" placeholder="Search By Book Publisher">
        <div id="publisherdiv" class="d-inline float-right"></div>
      </div>
      <div class="form-group">
        <input type="text" name="author" id="author" class="col-4 form-control d-inline" placeholder="Search By Book Author">
        <div id="author" class="d-inline"></div>
      </div>
      <div class="form-group">
        <input type="text" name="title" id="title" class="col-4 form-control d-inline" placeholder="Search By Book Title">
        <div id="title" class="d-inline"></div>
      </div>
      {{ csrf_field() }}
    </div>
  @endif
	<table class="table table-hover">
  <thead>
    <tr>
      <th>Title</th>
      <th>Auther</th>
      <th>Publisher</th>
      <th>Publishing Date</th>
      <th>Category</th>
      <th>Edition</th>
      <th>Pages</th>
      <th>No Of Copies</th>
      <th>Avilable</th>
      <th>Shelf Number</th>
      <th colspan="2">Modify</th>
    </tr>
  </thead>
  <tbody id="table">
  	@if(count($books) > 0)
	@foreach($books as $book)
    <tr>
				<td>{{$book->title}}</td>
				<td>{{$book->auther}}</td>
				<td>{{$book->publisher}}</td>
				<td>{{$book->publishing_date}}</td>
				<td>{{$book->category}}</td>
				<td>{{$book->edition}}</td>
				<td>{{$book->pages}}</td>
				<td>{{$book->no_of_copies}}</td>
				<td>{{$book->avilable}}</td>
				<td>{{$book->shelf_Number}}</td>
				<td>
					<a href="{{ url('/editB' , $book->id)}}" class="btn btn-success">Edit</a>
					<a href="{{ url('/destroyB' , $book->id)}}" class="btn btn-danger" name="delete">Delete</a>
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
            $("#publisher").keyup(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/publisher',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, query:$(this).val()},
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                      $('#publisherdiv').fadeIn();
                      $('#publisherdiv').html(data);
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
