@if ($Phone = Session::get('PhoneNumber') )
@extends('master')
@section('content')
<form method="post" action="{{route('VerifyPhone')}}">
	@csrf
<section class="AccountSection">
	@if($errors->any())
	<div class="ErrorSection" id="VerifySectionID">
		<!-- <div id="Cross"><i class="fa fa-times" aria-hidden="true"></i></div> -->
	 	@foreach($errors->all() as $error)
		<div id="ErrorSectionDiv3">
		{{$error}}
		</div>
		@endforeach
		
	</div>
	@endif
	<div class="LoginInnerSection">
		<div class="LoginFormSection">
			<div class="LoginPos UpperText">
				<p>We have sent a 4 digit otp</p>
			</div>
			<div class="LoginPos" >
				@php 
				$var = $Phone;
				echo '<p style="letter-spacing: 1px;">to your phone number ********' . substr($var,-4) .'</p>';
				@endphp
			</div>
			<div class="LoginPos LoginForm">
				<div class="Login User">
				<p>Enter OTP</p>
				<input type="password" autocomplete="off" name="CustomerPhoneToken">
				</div>
				<div class="Login LoginBtn">
					<input type="submit" value="Verify">
					<input type="hidden" name="CustomerPhone" value="{{$Phone}}">
				</div>
				</form>
				<form method="post" action="{{route('VerifyPhoneLater')}}">
					@csrf
				<div class="Login LoginBtn">
					<input type="submit" value="Verify Later">
					<input type="hidden" name="CustomerPhone" value="{{$Phone}}">
				</div>
			</form>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript" src="{{ asset('JS/script2.js')}}"></script>

	


@endsection
@else
 <script>window.location = "/Account";</script>
@endif
