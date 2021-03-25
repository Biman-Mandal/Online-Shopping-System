@extends('master')
@section('content')

<section class="AccountSection">
	@if($errors->any())
	<div class="ErrorSection" id="errorSectionID">
		<!-- <div id="Cross"><i class="fa fa-times" aria-hidden="true"></i></div> -->
	 	@foreach($errors->all() as $error)
		<div id="ErrorSectionDiv">
		{{$error}}
		</div>
		@endforeach
		
	</div>
	@endif
	<div class="InnerAccountSection" id="InnerAccountSectionID">
		
		<div class="SignInForm">
		<div class="SignUpTable" id="SignInFormID">
			<div class="SignUpText SignUpFormDeafult">
				<h1>Sign Up</h1>
			</div>
			<form method="post" action="{{route('SignUpAction')}}">
			@csrf
			<div class="SignUpFormDeafult">
				<div class="SignUpTableName TableRows">
					<p>Name</p>
					<input type="text" name="CustomerName">
				</div>
				<div class="SignUpTableNumber TableRows">
					<p>Phone Number</p>
					<input type="Number" name="CustomerPhone">
					<input type="hidden" name="CustomerPhoneToken">
					<input type="hidden" name="PhoneActive" >

				</div>
				<div class="SignUpTableEmail TableRows">
					<p>Email</p>
					<input type="Email" name="CustomerEmail">
				</div>
				<div class="SignUpTablePass TableRows">
					<p>Password</p>
					<input type="Password" name="CustomerPass">
				</div>
				<div class="SignUpTableRetypePass TableRows">
					<p>Retype Password</p>
					<input type="Password" name="CustomerRetype">
				</div>
				<div class="SignUpTableSubmit TableRows">
					<input class="SubmitBtn" type="submit" name="" value="SignUp">
				</div>
			</div>
			</form>
			<div class="OtherSignUpOption SignUpFormDeafult">
			<p>Or signUp with</p>
			</div>
		
		
		<div class="SocialApiLink SignUpFormDeafult">
			<div onclick="window.location='Google/auth/redirect'">
				<i class="fa fa-google google" aria-hidden="true"></i>
			</div>
			<div onclick="alert('Working on it..Please register your account via google')">
				<i  class="fa fa-facebook-square facebook" aria-hidden="true"></i>
			</div>
			
		</div>
		<div class="CreateAccount SignUpFormDeafult">
			<p>Don't Have An account<span class="Question">?</span><span id="LoginID" class="createOne">Create One</span></p>
		</div>
	</div>
</div>
</div>


	<div class="LoginInnerSection" id="LoginSectionID">
		<div class="ErrorSection" id="errorSectionID1">
		<!-- <div id="Cross"><i class="fa fa-times" aria-hidden="true"></i></div> -->
	 	@if ($message = Session::get('success') )
		<div id="ErrorSectionDiv1">
		{{$message}}
		</div>
		@endif
		
	</div>
		<div class="LoginFormSection" id="LoginFromID">
			<div class="LoginPos UpperText">
				<p>Login</p>
			</div>
			<form method="post" action="{{route('LoginAction')}}">
				@csrf
			<div class="LoginPos LoginForm">
				<div class="Login User">
				<p>Email / Phone Number</p>
				<input type="text" name="LoginUser">
				</div>
				<div class="Login Pass">
					<p>Password</p>
					<input type="Password" name="LoginPass">
				</div>
				<div class="Login LoginBtn">
					<input type="submit" value="Login">
				</div>
				</form>
			</div>
			<div class="LoginPos OthersSection">
				<div class="OtherApitext">
					Or Login with
				</div>
				<div class="ApiLinkLogin">
					<div>
						<i class="fa google fa-google google" aria-hidden="true"></i>
					</div>
					<div>
						<i  class="fa facebook fa-facebook-square facebook" aria-hidden="true"></i>
					</div>
				</div>
				<div class="NewHere">
					<p>Don't have an account<span class="Question">?</span><span class="Click" id="SignUpOpenFormID">Click Here</span></p>
				</div>
			</div>
		</div>
	</div>
</section>

@endSection
