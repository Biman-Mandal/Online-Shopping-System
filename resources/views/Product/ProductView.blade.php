@extends('master')
@section('content')
@foreach($ProductData as $Data)
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
<section class="ProductViewSection">
	<div class="FlexBox ImageBox">
		<div class="SmallImageSection ImgSec">
			<div class="SmallImg SmallImg1">
				<img id="SmlImg1ID" src="../StoredImages/{{$Data->Image1}}">
			</div>
			<div class="SmallImg SmallImg2">
				<img id="SmlImg2ID" src="../StoredImages/{{$Data->Image2}}">
			</div>
			<div class="SmallImg SmallImg3">
				<img id="SmlImg3ID" src="../StoredImages/{{$Data->Image3}}">
			</div>
			<div class="SmallImg SmallImg4">
				<img id="SmlImg4ID" src="../StoredImages/{{$Data->Image4}}">
			</div>
			<div class="SmallImg SmallImg5">
				<img id="SmlImg5ID" src="../StoredImages/{{$Data->Image5}}">
			</div>
		</div>
		<div class="BigImageSection ImgSec">
			<img id="MainImgID" src="../StoredImages/{{$Data->Image1}}">
		</div>
	</div>
	<div class="FlexBox ProductActionBox">
		<div class="Dscyptn ProductSec">
			<h3 class="text">Brand : <span>{{$Data->BrandName}}</span></h3>
			<h4 class="text">{{$Data->ProductName}}</h4>
			<h5 class="text">{{$Data->Description}}</h5>
			<h6 class="text">Price :<span> {{$Data->Price}}</span></h6>
			
		</div>
		<div class="Action ProductSec">
			<button onclick="document.location.href='{{"CartAction/".$Data->id}}';"  id="cartBtnID" class="cart"><i id="CartIconID" class="fa fa-shopping-cart" aria-hidden="true"></i>Add To Cart</button>
			<button id="BuyBtnID" class="buy"><i id="BuyIconID" class="fa fa-money" aria-hidden="true"></i>Buy Now</button>
		</div>
		
	</div>
</section>


@endforeach
@endsection
