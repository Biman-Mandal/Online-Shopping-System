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
	<section class="MainImgSection">
		<div class="MainImg"></div>
		<div class="MainImgText">
			<h1 class="toptext">The best offer <span> of this summer.</span></h1>
			<h1 class="TextOffer">FLat <span>50%</span> Off</h1>
			<div class="TextBtn">
				<p>Men</p>
				<p>Women</p>
			</div>
		</div>
	</section>	
	<section class="ProductSection">
		<div class="InnerProductSection">
			<div class="ProductText">
				<h1>Best Selling Products</h1>
				<p>Men's Top Wear</p>
			</div>
			<div class="ProductsUpperDiv">
				@foreach($ProductData as $Data)
				<a target="_black" href={{"MenTopWear/".$Data->id}} >
				<div class="Box">
					<div class="Img">
						<img src="StoredImages/{{$Data->Image1}}">
					</div>
					<div class="Descrypton">
						<h2  class="text">{{$Data->ProductName}}</h2>
						<h3 class="text"><span>Brand :</span> {{$Data->BrandName}}</h3>
						<h4 class="text"><span>Price :</span> {{$Data->Price}}</h4>
					</div>
				</div>
				</a>
				@endforeach
			</div>
		</div>
	
	</section>


	<!-- -->
@endsection