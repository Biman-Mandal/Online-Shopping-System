// 
// 
// 
var varCartPriceID=document.getElementById("CartPriceID");
var varCrossID=document.getElementById("CrossID");
var varResPriceDetail=document.getElementById("ResPriceDetail");
varResPriceDetail.addEventListener("click", function(){
	varCartPriceID.style.display = 'block';
});
varCrossID.addEventListener("click", function(){
	varCartPriceID.style.display = 'none';
});
