<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registermodel extends CI_model {

	/*this function for new register user*/

	public function newuserregister($email,$number,$password,$token)
	{
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));

		
		$data = array(
        'user_token' => "$token",
        'user_email_id' => "$email",
        'user_mobile_number' => "$number",
        'user_mobile_verification' => "$current_time",
        'user_pwd' => "$password",
        'created_at' => "$current_time"
		);
		return $this->db->insert('employee_user', $data);
	}
	
}
