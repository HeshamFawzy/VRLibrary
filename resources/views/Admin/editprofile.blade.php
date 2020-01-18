@extends('layouts.app')

@section('content')
<div class="container col-6 card p-4">
	<form method="post" action="{{ route('admin.updateportfolio', $id)}}" enctype="multipart/form-data">
	    @csrf
	    <h1 class="text-center">Add Profile Picture</h1>
	    <div class="form-group">
	        <label for="image" class="h4">Image :</label>
	        <input type="file" class="form-control" name="image" required="" accept="image/gif, image/jpeg, image/png"/>
	    </div>
	      <div class="form-group">
	        <input type="submit" class="btn btn-primary float-right" name="submit" value="Save" />
	        <a href="{{url('/Adminindex')}}" class="btn btn-primary float-left">Back</a>
	    </div>
	</form>
</div>
@endsection
