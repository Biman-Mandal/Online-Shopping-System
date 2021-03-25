
@if(Session::get('GoogleData'))
@extends('master')
@section('content')
<form method="post" action="{{route('GoogleDataSubmit')}}">

<section class="AccountSection">
	@if($errors->any())
	<div class="ErrorSection" id="GoogleDataPassError">
		<!-- <div id="Cross"><i class="fa fa-times" aria-hidden="true"></i></div> -->
	 	@foreach($errors->all() as $error)
		<div id="">
		{{$error}}
		</div>
		@endforeach
		
	</div>
	@endif

	@csrf
	<div class="LoginInnerSection">
		<div class="LoginFormSection">
			<div class="LoginPos UpperText">
				<p>Please create your password</p>
			</div>
			<div class="LoginPos" >
				
			</div>
			<div class="LoginPos LoginForm">
				<div class="Login User">
				<p>Enter Password</p>
				<input type="password" autocomplete="off" name="CustomerPass">
				</div>
				<div class="Login User">
				<p>ReEnter Password</p>
				<input type="password" autocomplete="off" name="CustomerRePass">
				</div>
				<div class="Login LoginBtn">
					<input type="submit" value="Submit">
				</div>
				
			</div>
		</div>
	</div>
</section>
</form>
<script type="text/javascript" src="{{ asset('JS/script2.js')}}"></script>
@endsection
@else
<script>window.location = "/Account";</script>
@endif





