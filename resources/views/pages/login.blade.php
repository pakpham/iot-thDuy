@extends('layouts.master')


@section('content')



<div class="">
	<h1>LOGIN</h1>
	<form action="{{route('login')}}" method="POST" style="width: 500px; border: solid 2px blue; border-radius: 20px; padding: 20px">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="name">
			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
		</div>
		<div class="form-group form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1">Check me out</label>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>


	@if (isset($error))
		{{$error}}
	@else

	@endif
</div>

@endsection() 	