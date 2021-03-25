<!DOCTYPE html>
<html>
<head>
	<title>|| Online Shopping Site (Mini Project) ||</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/Master.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/HomePage.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/Product.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/Account.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/viewCart.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	
	<section class="NavSection"> 
		<nav class="Navbar">
			<div class="SiteLogo">
				<img src="{{ asset('Images/shoppingLogo.webp')}}">
				<h1  onclick="location.href = '/';">Online Shopping System</h1>
			</div>
			<div class="Search">
				<input name="Search" placeholder="Search Here">
				<i class="fa fa-search" aria-hidden="true"></i>
			</div>
			<!--  -->
			
			<div class="NavPages">
				@if(Session()->has('cart'))
				<h1  onclick="location.href = '/ViewCart';" class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"><p class="CartCount">{{count(Session()->get('cart'))}}</p></i>Cart</h1>
				@else
				<h1 onclick="location.href = '/ViewCart';" class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart</h1>
				@endif
				@if(Session()->has('IsLogin'))
				<h1 id="AccountDropID" class="AccountDropClass"><i class="fa Icon fa-user-circle" aria-hidden="true"></i>Account<i class="fa AccountDrop fa-angle-double-down" aria-hidden="true"></i>
				
				<div class="AccountDropSection" id="AccountDropSection">
					<a href="#"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
					<a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Orders</a>
					<a href="#"><i class="fa fa-bell" aria-hidden="true"></i>Notifications</a>
					<a href="{{route('LogoutAction')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
				</div>
				@else
				<h1 onclick="location.href = '/Account';" class="login"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</h1>
				@endif
				</h1>
				
			</div>
			
		</nav>
	</section>
	@yield('content')
	
</body>
</html>


<script type="text/javascript" src="{{ asset('JS/script.js')}}"></script>
<script type="text/javascript" src="{{ asset('JS/script1.js')}}"></script>
<script type="text/javascript" src="{{ asset('JS/script3.js')}}"></script>
