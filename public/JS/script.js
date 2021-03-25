	var varSmlImg1ID=document.getElementById("SmlImg1ID");
	var varSmlImg2ID=document.getElementById("SmlImg2ID");
	var varMainImgID=document.getElementById("MainImgID");

	var varSmlImg3ID=document.getElementById("SmlImg3ID");
	var varSmlImg4ID=document.getElementById("SmlImg4ID");
	var varSmlImg5ID=document.getElementById("SmlImg5ID");




	window.onload = function() {
		if (varSmlImg1ID.src=="http://localhost:8000/StoredImages/") {
			varSmlImg1ID.style.display = 'none';
		}else{
			varSmlImg1ID.addEventListener("mouseover", function(){
			varMainImgID.src=varSmlImg1ID.src;
		});
		};
		if (varSmlImg2ID.src=="http://localhost:8000/StoredImages/") {
			varSmlImg2ID.style.display = 'none';
		}else{
			varSmlImg2ID.addEventListener("mouseover", function(){
			varMainImgID.src=varSmlImg2ID.src;
			// alert(varSmlImg2ID.src);
	});
		};
		// 
		if (varSmlImg3ID.src=="http://localhost:8000/StoredImages/") {
			varSmlImg3ID.style.display = 'none';
		}else{
			varSmlImg3ID.addEventListener("mouseover", function(){
			varMainImgID.src=varSmlImg3ID.src;
			// alert(varSmlImg2ID.src);
	});
		};
		// 
		if (varSmlImg4ID.src=="http://localhost:8000/StoredImages/") {
			varSmlImg4ID.style.display = 'none';
		}else{
			varSmlImg4ID.addEventListener("mouseover", function(){
			varMainImgID.src=varSmlImg4ID.src;
			// alert(varSmlImg2ID.src);
	});
		};
		// 
		if (varSmlImg5ID.src=="http://localhost:8000/StoredImages/") {
			varSmlImg5ID.style.display = 'none';
		}else{
			varSmlImg5ID.addEventListener("mouseover", function(){
			varMainImgID.src=varSmlImg5ID.src;
			// alert(varSmlImg2ID.src);
	});
		};
	
// http://localhost:8000/StoredImages/
	
	
	
	
	
	
 // 
 // 
 // 
	var varcartBtnID=document.getElementById("cartBtnID");
	var varBuyBtnID=document.getElementById("BuyBtnID");
	// 
	var varCartIconID=document.getElementById("CartIconID");
	var varBuyIconID=document.getElementById("BuyIconID");


	varcartBtnID.addEventListener("mouseover", function(){
		varCartIconID.style.transform = 'rotate(20deg)';
	});
	varcartBtnID.addEventListener("mouseout", function(){
		varCartIconID.style.transform = 'rotate(360deg)';
	});
	varBuyBtnID.addEventListener("mouseover", function(){
		varBuyIconID.style.transform = 'rotate(20deg)';
	});
	varBuyBtnID.addEventListener("mouseout", function(){
		varBuyIconID.style.transform = 'rotate(360deg)';
	});

};
// Create Account


