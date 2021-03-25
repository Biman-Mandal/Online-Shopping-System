// Sign Up page Create One id  for login

var varLoginID=document.getElementById("LoginID");
var varInnerAccountSectionID=document.getElementById("InnerAccountSectionID");
var varSignInFormID=document.getElementById("SignInFormID");

varLoginID.addEventListener("click", function(){
	varInnerAccountSectionID.style.width="0px";
	varSignInFormID.style.display = 'none';
	setTimeout(SignFormTimeOut, 300);
	setTimeout(SignUpDisplay, 500);

});

 	function SignFormTimeOut(){
 		varLoginSectionID.style.width = '600px';
 		
 	}
 	function SignUpDisplay(){
 		varLoginFromID.style.display = 'block';
 	}
// login page click here id for sign up 

 var varSignUpOpenFormID=document.getElementById("SignUpOpenFormID");
 var varLoginSectionID=document.getElementById("LoginSectionID");
 var varLoginFromID=document.getElementById("LoginFromID");
 	
 	varSignUpOpenFormID.addEventListener("click", function(){
 		varLoginFromID.style.display= 'none';
 		varLoginSectionID.style.width="0px";
 		setTimeout(LoginFormTimeOut, 500);
 	});
 	
 	var varErrorSectionDiv=document.getElementById("ErrorSectionDiv");
 	// varErrorSectionDiv.addEventListener("click", function(){
 		if (varErrorSectionDiv) {
 		varLoginFromID.style.display= 'none';
 		varLoginSectionID.style.width="0px";
 		setTimeout(LoginFormTimeOut, 500);
 		}
 	// });
 	function LoginFormTimeOut(){
 		varInnerAccountSectionID.style.width = '600px';
 		varSignInFormID.style.display = 'block';
 	}
 	// var varCross=document.getElementById("Cross");
 	var errorSectionID=document.getElementById("errorSectionID");
 	var errorSectionID1=document.getElementById("errorSectionID1");
 	
 	// varCross.addEventListener("click",function(){
 	// 	errorSectionID.style.display = 'none';
 	// });
 	setTimeout(AutoErrorHide,10000);
 	setTimeout(AutoErrorHide1,10000);
 	
 	function AutoErrorHide(){
 		errorSectionID.style.width = '0px';
 	}
 	function AutoErrorHide1(){
 		errorSectionID1.style.width = '0px';
 	}
 	
 	

//  errorSectionID1
// ErrorSectionDiv1
 	

