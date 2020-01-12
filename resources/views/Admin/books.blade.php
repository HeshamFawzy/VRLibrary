@extends('layouts.app')

@section('content')
<div class="row p-1 m-2 d-flex justify-content-center">
	<div class="col-12 p-2" style="background-color: white;">
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
@endsection
