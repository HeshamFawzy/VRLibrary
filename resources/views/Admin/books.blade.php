@extends('layouts.app')

@section('content')
<div class="row p-1 m-2 d-flex justify-content-center">
	<div class="col-12 p-2" style="background-color: white;">
	<table class="table table-hover">
  <thead>
    <tr>
      <th>Book Title</th>
      <th>Book Auther</th>
      <th>Book Publisher</th>
      <th>Book Publishing Date</th>
      <th>Book Category</th>
      <th>Book Edition</th>
      <th>Book Pages</th>
      <th>Book No Of Copies</th>
      <th>Book Avilable</th>
      <th>Book Shelf Number</th>
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
					<a href="{{ url('/edit' , $book->id)}}" class="btn btn-success">Edit</a>
					<a href="{{ url('/destroy' , $book->id)}}" class="btn btn-danger" name="delete">Delete</a>
				</td>
    </tr>
    @endforeach
	@endif
  </tbody>
</table>
<div>
</div>
<br>
@endsection
