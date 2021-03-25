@if(Session :: has ('cart') && Session :: has ('IsLogin'))
@extends('master')
@section('content')
@if ($message = Session::get('Homesuccess') )
		<div id="HomePageErrorSection">
			{{$message}}
		</div>
	@endif
	@if($errors->any())
	@foreach($errors->all() as $error)
		<div id="HomePageErrorSection">
		{{$error}}
		</div>
		@endforeach
		
	</div>
	@endif
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
				<p>Final verification</p>
			</div>
			<!--  -->
			<form method="post" action="{{route('FinalVerification')}}">
				@csrf
			<div class="LoginPos LoginForm">
				<div class="LoginPos">
				<p>Delivary address must contain pincode</p>
				</div>
				<div class="Login User">
				<p>Delivary Address</p>
				<input type="text" autocomplete="off" name="CustomerAddress" required>
				</div>
				@if($DatabaseData->PhoneActive==1)
				
				<div class="Login User">
				<p>Phone Number</p>
				<div class="LoginPos">
				<p><i class="fa fa-check-square" style="margin-right: 6px;color: skyblue" aria-hidden="true"></i>Your phone number is verified</p>
				</div>
				
				</div>
				@else
				<div class="LoginPos">
				<p><i class="fa fa-window-close" style="margin-right: 6px;color: red;" aria-hidden="true"></i> Please verify your phone</p>
				</div>
				<div class="Login User">
				<p>Phone Number</p>
				<input type="Number" autocomplete="on" name="CustomerPhone" value="{{$DatabaseData->CustomerPhone}}">
				</div>
				@endif
				@if($DatabaseData->CustomerEmailActive==1)
				<div class="Login User">
				<p>Email</p>
				<div class="LoginPos">
				<p><i class="fa fa-check-square" style="margin-right: 6px;color: skyblue" aria-hidden="true"></i>Your email is verified</p>
				</div>
				
				</div>
				@else
				<div class="LoginPos">
				<p><i class="fa fa-window-close" style="margin-right: 6px;color: blue;" aria-hidden="true"></i>Please Verify your Email(Not Required)</p>
				</div>
				<div class="Login User">
				<p>Email</p>
				<input type="Email" autocomplete="off" name="CustomerEmail">
				</div>
				@endif
				<div class="Login LoginBtn">
					<input type="submit" value="Verify">
				</div>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection
@else
<script>window.location = "/";</script>
@endif

