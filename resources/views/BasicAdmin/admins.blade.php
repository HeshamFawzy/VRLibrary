@extends('layouts.app')

@section('content')
<div class="container col-6 card p-4">
	    <h1 class="text-center">Create Admin</h1>
	    <div class="form-group">
	        <label for="firstname" class="h4">First Name :</label>
	        <input type="text" class="form-control" name="firstname" />
	    </div>

	     <div class="form-group">
	        <label for="lastname" class="h4">Last Name :</label>
	        <input type="text" class="form-control" name="lastname" />
	    </div>

	     <div class="form-group">
	        <label for="email" class="h4">Email :</label>
	        <input type="email" class="form-control" name="email" />
	    </div>

	     <div class="form-group">
	        <label for="password" class="h4">Password :</label>
	        <input type="password" class="form-control" name="password" />
	    </div>

	    <div class="form-group">
	        <label for="hiredate" class="h4">Hire Date :</label>
	        <input type="date" class="form-control" name="hiredate" />
	    </div>

	     <div class="form-group">
	        <label for="salary" class="h4">Salary :</label>
	        <input type="number" class="form-control" name="salary" />
	    </div>
	      <div class="form-group">
	        <input type="submit" class="btn btn-primary float-right" name="submit" value="Save" />
	    </div>
	</form>
</div>
@endsection
