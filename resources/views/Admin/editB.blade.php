@extends('layouts.app')

@section('content')
<div class="row p-1 m-2 d-flex justify-content-center">
		<div class="col-6 card ml-2">
			<form method="post" action="{{url('/updateB' , $book->id)}}" enctype="multipart/form-data">
	    		@csrf
			    <h1 class="text-center">Edit book</h1>
			    <div class="form-group">
			        <label for="title" class="h4">Book Title :</label>
			        <input type="text" class="form-control" name="title" id="title" value="{{$book->title}}" />
			    </div>

			     <div class="form-group">
			        <label for="auther" class="h4">Book Auther :</label>
			        <input type="text" class="form-control" name="auther" id="auther" value="{{$book->auther}}"/>
			    </div>

			     <div class="form-group">
			        <label for="publisher" class="h4">Publisher :</label>
			        <input type="text" class="form-control" name="publisher" id="publisher" value="{{$book->publisher}}"/>
			    </div>

			    <div class="form-group">
			        <label for="publishingdate" class="h4">Publishing Date :</label>
			        <input type="date" class="form-control" name="publishingdate" id="publishingdate" value="{{$book->publishing_date}}"/>
			    </div>

			     <div class="form-group">
			        <label for="category" class="h4">Category :</label>
			        <input type="text" class="form-control" name="category" id="category" value="{{$book->category}}"/>
			    </div>

			     <div class="form-group">
			        <label for="edition" class="h4">Edition :</label>
			        <input type="text" class="form-control" name="edition" id="edition" value="{{$book->edition}}"/>
			    </div>

			    <div class="form-group">
			        <label for="pages" class="h4">Pages :</label>
			        <input type="number" class="form-control" name="pages" id="pages" value="{{$book->pages}}"/>
			    </div>

			    <div class="form-group">
			        <label for="noofcopies" class="h4">No Of Copies :</label>
			        <input type="number" class="form-control" name="noofcopies" id="noofcopies" value="{{$book->no_of_copies}}"/>
			    </div>

			    <div class="form-group">
			        <label for="avilable" class="h4">Avilable :</label>
			        <input type="text" class="form-control" name="avilable" id="avilable" value="{{$book->avilable}}"/>
			    </div>

			    <div class="form-group">
			        <label for="shelfNumber" class="h4">Shelf Number :</label>
			        <input type="number" class="form-control" name="shelfNumber" id="shelfNumber" value="{{$book->shelf_Number}}"/>
			    </div>

			    <div class="form-group">
			       <input type="submit" class="btn btn-primary float-right" name="submit" value="Save" />
			</form>
	        <a href="{{url('/books')}}" class="btn btn-primary">Back</a>
	    </div>
</div>
@endsection