@extends('master')
@section('content')
@if(Session :: has ('cart'))

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
<section class="ViewCartSection">
	<div class="innerViewCart">
		<div class="CartBoxs CartData">
			<div class="InnerCartData CartHeader">
				<h1>My Cart (2)</h1>
			</div>
			@php
			$total=0;
			$total_Q=0;
			@endphp
			@foreach(Session::get('cart') as $id=>$Data)
			@php
			$sub_Total=$Data['product_price']*$Data['quantity'];
			$total_Q+=$Data['quantity'];
			$total+=$sub_Total;
			@endphp
			<div class="InnerCartData CartMainData">
				<div class="MainDataFlex MainDataFlex1">
					<img src="StoredImages/{{$Data['product_image']}}">
				</div>
				<div class="MainDataFlex MainDataFlex2">
					<div class="MainDataFlex2Data innerFlex">
					<h1>{{$Data['product_name']}}<span style="color: red;font-size: 15px;"> ({{$Data['quantity']}})</span></h1>
					<p>Brand :<span> {{$Data['product_brand']}}</span></p>
					<h4>Price :<span> {{$Data['product_price']}}</span></h4>
					</div>
					<div class="MainDataFlex2Btns innerFlex">
						<a href="#">SAVE IT FOR LATER</a>
						<a href={{route('RemoveData', ['id' => $id])}}>REMOVE</a>
					</div>
				</div>

			</div>
			@endforeach
			
			<div class="InnerCartData CartOrder">
				<button onclick="window.location='/CartVerify'"><i class="fa fa-money" aria-hidden="true"></i>Place Order</button>
			</div>
		</div>


		<!-- Res -->
		<div id="ResPriceDetail"><i class="fa fa-angle-double-left" aria-hidden="true"></i>Price Detail</div>
		
		<div class="CartBoxs CartPrice" id="CartPriceID">
			<div id="CrossID"><i class="fa fa-window-close" aria-hidden="true"></i></div>
			<div class="CartInnerPrice CartPriceHeader">
				<h1>Price Detail</h1>
			</div>
			<div class="CartInnerPrice CalSection">
				<div class="CalType">
					<h4>Price ({{$total_Q}} item)</h4>
					<p>₹{{$total}}</p>
				</div>
				<div class="CalType">
					<h4>Discount</h4>
					<p>₹0</p>
				</div>
				<div class="CalType">
					<h4>Delivary Charge</h4>
					<p style="color: darkgreen">Free</p>
				</div>
			</div>
			<div class="CartInnerPrice TotalSection">
				<h4>Total Amount</h4>
				<p>₹{{$total}}</p>
			</div>
			<div class="CartInnerPrice PayTypeNote">
				<h4><i class="fa fa-shield" aria-hidden="true"></i>Safe and Secure Payments.Easy returns.100% Authentic products.</h4>
			</div>
		</div>

		<!-- Normal -->
		<div class="CartBoxs CartPrice">
			
			<div class="CartInnerPrice CartPriceHeader">
				<h1>Price Detail</h1>
			</div>
			<div class="CartInnerPrice CalSection">
				<div class="CalType">
					<h4>Price ({{$total_Q}} item)</h4>
					<p>₹{{$total}}</p>
				</div>
				<div class="CalType">
					<h4>Discount</h4>
					<p>₹0</p>
				</div>
				<div class="CalType">
					<h4>Delivary Charge</h4>
					<p style="color: darkgreen">Free</p>
				</div>
			</div>
			<div class="CartInnerPrice TotalSection">
				<h4>Total Amount</h4>
				<p>₹{{$total}}</p>
			</div>
			<div class="CartInnerPrice PayTypeNote">
				<h4><i class="fa fa-shield" aria-hidden="true"></i>Safe and Secure Payments.Easy returns.100% Authentic products.</h4>
			</div>
		</div>
		
	</div>
</section>
<script type="text/javascript" src="{{ asset('JS/cartScript.js')}}"></script>
@endif
@endsection