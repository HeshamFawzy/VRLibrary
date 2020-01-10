@extends('layouts.app')

@section('content')
	<div class="container d-flex align-content-center" style="background-color: white;">
		<h1>BasicAdminUser email :</h1>
		<p>{{$BasicAdminUser->email}}</p>
		<br>
		<h1>BasicAdminUser password :</h1>
		<p>123456Aa_</p>
	</div>
@endsection