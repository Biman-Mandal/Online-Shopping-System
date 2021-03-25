if (document.getElementById("AccountDropID")) {
var varAccountDropID=document.getElementById("AccountDropID");
var varAccountDropSection=document.getElementById("AccountDropSection");
varAccountDropID.addEventListener("mouseover", function(){
	varAccountDropSection.style.display = 'flex';
});
// 
varAccountDropID.addEventListener("mouseout", function(){
	varAccountDropSection.style.display = 'none';
});
};




var varHomePageErrorSection=document.getElementById("HomePageErrorSection");
setTimeout(HomePageLoad, 500);
function HomePageLoad(){
	varHomePageErrorSection.style.width = '250px';
}
setTimeout(HomeErrorHide,10000);

function HomeErrorHide(){
	varHomePageErrorSection.style.width = '0px';
}