if (document.getElementById("VerifySectionID")) {
var varVerifySectionID=document.getElementById("VerifySectionID");
setTimeout(AutoErrorHide2, 10000);
function AutoErrorHide2(){
 		varVerifySectionID.style.width='0px';
 	}
}
if (document.getElementById("GoogleDataPassError")) {
	var varGoogleData=document.getElementById("GoogleDataPassError");
	setTimeout(AutoErrorHide3, 10000);
	function AutoErrorHide3(){
 		varGoogleData.style.width='0px';
 	}
}