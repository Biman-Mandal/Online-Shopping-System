<?php 
namespace App;
class SendCode
{
	public static function SendCode($phone){
		$code=rand(1111,9999);
		$nexmo = app('Nexmo\Client');
		
		
		
		return $code;
	}
}