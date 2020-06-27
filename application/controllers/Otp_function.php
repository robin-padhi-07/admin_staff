<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
ini_set('display_errors', 0);
class Otp_function extends CI_Controller {

	/*this function check and validation otp for registation and login*/
	public $authKey;
	public function otp_check_registration()
	{
		
		$number['n'] = $this->input->post("n");
		if (empty($number['n'])) {
			echo "Enter number";
		}else{

			$otp = rand(100000,999999);
			$_SESSION['otp'] = $otp;
			$_SESSION['number'] = $number['n'];
			//Your authentication key
			$authKey = "307390AltWJr545ee89c93P1";
			//Multiple mobiles numbers separated by comma
			$mobileNumber = "91".$number['n'];
			//Sender ID,While using route4 sender id should be 6 characters long.
			$senderId = "STAFFI";
			//Your message to send, Add URL encoding here.
			$message = urlencode("OTP is ".$otp.". Please do not share anyone.");

			//Define route 
			//$route = "default";
			//Prepare you post parameters
			$postData = array(
			    'authkey' => $authKey,
			    'mobiles' => $mobileNumber,
			    'message' => $message,
			    'sender' => $senderId
			  	//'route' => $route
			);
			//API URL
			if (isset($authKey)) {
				$url="https://api.msg91.com/api/sendotp.php?otp=$otp&sender=$senderId&message=$message&mobile=$mobileNumber&authkey=$authkey";
			}

			// init the resource
			$ch = curl_init($url);
			curl_setopt_array($ch, array(
			    CURLOPT_URL => $url,
			    CURLOPT_RETURNTRANSFER => true,
			    CURLOPT_POST => true,
			    CURLOPT_POSTFIELDS => $postData
			    //,CURLOPT_FOLLOWLOCATION => true
			));
			//Ignore SSL certificate verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_exec($ch);
			curl_close($ch);
			echo $this->number['m'] = "OTP successfully sent your registered mobile number";
		}
	}

	public function sendmassage($mobile){

		$mobileNumber = "91".$mobile;

		$authKey = "307390AltWJr545ee89c93P1";
		
			//Sender ID,While using route4 sender id should be 6 characters long.
			$senderId = "STAFFI";
			//Your message to send, Add URL encoding here.
			$message = urlencode("You are successfully registered.");

			//Define route 
			//$route = "default";
			//Prepare you post parameters
			$postData = array(
			    'authkey' => $authKey,
			    'mobiles' => $mobileNumber,
			    'message' => $message,
			    'sender' => $senderId
			  	//'route' => $route
			);
			//API URL

			$url="https://api.msg91.com/api/sendhttp.php";
			

			// init the resource
			$ch = curl_init($url);
			curl_setopt_array($ch, array(
			    CURLOPT_URL => $url,
			    CURLOPT_RETURNTRANSFER => true,
			    CURLOPT_POST => true,
			    CURLOPT_POSTFIELDS => $postData
			    //,CURLOPT_FOLLOWLOCATION => true
			));
			//Ignore SSL certificate verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_exec($ch);
			curl_close($ch);

		if ($err) {
		    echo "cURL Error #:" . $err;
		} else {
		    echo $response;
		}
	}
}
