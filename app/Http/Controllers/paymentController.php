<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function paymentSubmit(){
    	echo "<pre>";
    	// print_r(session()->all());
    	//  && session()->get('CustomerDataKey') && session()->get('IsLogin')

    	if (session()->get('cart')) {
    		// $ProductName=session()->get('cart')[12]['product_name'];
    		
    		// print_r($Customer);
    		$data=session()->get('cart');
    		foreach ($data as $key => $value) {
    		// print_r($key);
    		$ProductName=$value['product_name'];
    		}
    		// echo "<br>";
    		 $Customer=session()->get('CustomerDataKey');
    			// print_r($Customer);
    		// exit();
    		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER,
		            array("X-Api-Key:",
		                  "X-Auth-Token:"));
		$payload = Array(
		    'purpose' => 'Buy'.$ProductName,
		    'amount' => $Customer['TotalAmount'],
		    'phone' => $Customer['CustomerPhone'],
		    'buyer_name' => $Customer['CustomerName'],
		    'redirect_url' => 'http://localhost:8000/instamozo_redirect',
		    'send_email' => true,
		    'webhook' => 'http://www.example.com/webhook/',
		    'send_sms' => true,
		    'email' => 'foo@example.com',
		    'allow_repeated_payments' => false
		);
		// print_r($payload);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
		$response = curl_exec($ch);
		curl_close($ch); 
		$response=json_decode($response);
		echo "<pre>";
		// print_r($response);
		// echo ;
		return redirect($response->payment_request->longurl);
		// exit();
    	}else{
    		return redirect('/');
    		// echo "hello1";
    	}
    	// exit();
    	
    }
    public function instamozo_redirect(){
    	echo "<pre>";
    	print_r($_GET);
    }
}
