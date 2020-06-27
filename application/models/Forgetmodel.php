<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgetmodel extends CI_model {

	/*this function for new register user*/

	public function forgetmodeldata($MobileNo)
	{
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		$data = array(
        'user_mobile_number' => "$MobileNo",
		);
		$q = $this->db->where(['user_mobile_number'=>$MobileNo])
						->get('employee_user');
		if ($q->num_rows()) {
			return $q->result();
			
		}else{
			return false;
		}
		
	}
	
}
