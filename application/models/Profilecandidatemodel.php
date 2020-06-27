<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilecandidatemodel extends CI_model {

	/*this function for new register user*/

	public function profiledata($token)
	{
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		$data = array(
        'user_token' => "$token",
		);
		$q = $this->db->where(['user_token'=>$token])
						->get('employee_user');
		if ($q->num_rows()==1) {
			return $q->result();
			
		}else{
			return false;
		}
		
	}

	/*this function for personal information insert*/
	
	public function insertpersonaldata($token, $user_token, $firstname, $lastname, $state, $city, $address, $gender,$dob, $expyear, $expmonth, $c_salary_lac, $c_salary_thousand, $languages){

		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		$da = $this->db->where('user_token', $user_token)
				->get('candidate_profile');
		if ($da->num_rows() > 0) {
			
			return false;
			
		}else{
			$data = array(
				'candidate_profile_token' => "$token",
		        'user_token' => "$user_token",
		        'candidate_profile_first_name' => "$firstname",
		        'candidate_profile_last_name' => "$lastname",
		        'candidate_profile_state_name' => "$state",
		        'candidate_profile_city_name' => "$city",
		        'candidate_profile_permanent_address' => "$address",
		        'candidate_profile_gender' => "$gender",
		        'candidate_profile_dob' => "$dob",
		        'candidate_profile_total_years_of_exp' => "$expyear"." "."$expmonth",
		        'candidate_profile_current_salary' => "$c_salary_lac"." "."$c_salary_thousand",
		        'candidate_profile_language_spoken' => "$languages",
		        'candidate_profile_created_at' => "$current_time",
			);
			return $this->db->insert('candidate_profile', $data);
		}
		
	}


	/*get model data personal information*/
	
	public function getpersonaldatamodel($token){
		$q = $this->db->where('user_token', $token)
						->get('candidate_profile');
		if ($q->num_rows()>0) {
			
			return $q->result();
			
		}else{
			return false;
		}		
	}

	public function updatepersonalmodel($user_token, $firstname, $lastname, $state, $city, $address, $gender,$dob, $expyear, $expmonth, $c_salary_lac, $c_salary_thousand, $languages){

		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		$da = $this->db->where('user_token', $user_token)
				->get('candidate_profile');
		if ($da->num_rows() > 0) {
			$data = array(
		        'candidate_profile_first_name' => "$firstname",
		        'candidate_profile_last_name' => "$lastname",
		        'candidate_profile_state_name' => "$state",
		        'candidate_profile_city_name' => "$city",
		        'candidate_profile_permanent_address' => "$address",
		        'candidate_profile_gender' => "$gender",
		        'candidate_profile_dob' => "$dob",
		        'candidate_profile_total_years_of_exp' => "$expyear"." "."$expmonth",
		        'candidate_profile_current_salary' => "$c_salary_lac"." "."$c_salary_thousand",
		        'candidate_profile_language_spoken' => "$languages",
		        'candidate_profile_updated_at' => "$current_time",
			);
			

			$this->db->where('user_token', $user_token);
			$this->db->update('candidate_profile', $data);
			return true;
			
		}else{
			return false;
		}
	}

	/*end this function */

	/*for experince section */

	public function insertexperincemodel($token, $user_token, $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $present){
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));

		$data = array(
			'work_experience_token' => "$token",
		    'user_token' => "$user_token",
		    'work_experience_position' => "$positionname",
		    'work_experience_company_name' => "$comapnyname",
		    'work_experience_state' => "$state",
		    'work_experience_city' => "$city",
		    'work_experience_start_year' => "$startyear",
		    'work_experience_start_month' => "$startmonth",
		    'work_experience_still_working' => "$present",
		    'work_experience_create_at' => "$current_time"
		);
		return $this->db->insert('work_experience', $data);
		
	}

	public function insertexperincemodelcondition($token, $user_token, $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $endyear, $endmonth){
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));

		$data = array(
			'work_experience_token' => "$token",
		    'user_token' => "$user_token",
		    'work_experience_position' => "$positionname",
		    'work_experience_company_name' => "$comapnyname",
		    'work_experience_state' => "$state",
		    'work_experience_city' => "$city",
		    'work_experience_start_year' => "$startyear",
		    'work_experience_start_month' => "$startmonth",
		    'work_experience_end_year' => "$endyear",
		    'work_experience_end_month' => "$endmonth",
		    'work_experience_create_at' => "$current_time"
		);
		return $this->db->insert('work_experience', $data);
		
	}

	public function insertexperincemodelmore($token, $user_token, $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $present){
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));

		$data = array(
			'work_experience_token' => "$token",
		    'user_token' => "$user_token",
		    'work_experience_position' => "$positionname",
		    'work_experience_company_name' => "$comapnyname",
		    'work_experience_state' => "$state",
		    'work_experience_city' => "$city",
		    'work_experience_start_year' => "$startyear",
		    'work_experience_start_month' => "$startmonth",
		    'work_experience_still_working' => "$present",
		    'work_experience_create_at' => "$current_time"
		);
		return $this->db->insert('work_experience', $data);
		
	}

	public function insertexperincemodelconditionmore($token, $user_token, $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $endyear, $endmonth){
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));

		$data = array(
			'work_experience_token' => "$token",
		    'user_token' => "$user_token",
		    'work_experience_position' => "$positionname",
		    'work_experience_company_name' => "$comapnyname",
		    'work_experience_state' => "$state",
		    'work_experience_city' => "$city",
		    'work_experience_start_year' => "$startyear",
		    'work_experience_start_month' => "$startmonth",
		    'work_experience_end_year' => "$endyear",
		    'work_experience_end_month' => "$endmonth",
		    'work_experience_create_at' => "$current_time"
		);
		return $this->db->insert('work_experience', $data);
		
	}


	public function getexpdatamodel($token){
		$query = $this->db->where('user_token', $token)
						->get('work_experience');
		if ($query->num_rows()>0) {
			
			return $query->result();
			
		}else{
			return false;
		}
	}

	public function getexpdataforupdate($experience_token, $user_token){
		$query = $this->db->where('work_experience_token', $experience_token)
						->where('user_token', $user_token)
						->get('work_experience');
		if ($query->num_rows()>0) {
			
			return $query->result();
			
		}else{
			return false;
		}
	}
	public function updateexprencedatamodal($u_token, $user_token, $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $present){
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		$data = array(
		    'work_experience_position' => "$positionname",
		    'work_experience_company_name' => "$comapnyname",
		    'work_experience_state' => "$state",
		    'work_experience_city' => "$city",
		    'work_experience_start_year' => "$startyear",
		    'work_experience_start_month' => "$startmonth",
		    'work_experience_end_year' => NULL,
			'work_experience_end_month' => NULL,
		    'work_experience_still_working' => "$present",
		    'work_experience_updated_at' => "$current_time"
		);

		if ($this->db->where('work_experience_token', $u_token)
					->where('user_token', $user_token)
					->update('work_experience', $data)) {
			return true;
		}else{
			return false;
		}
		
	}

	public function updateexprencedatamodal1($u_token, $user_token, $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $endyear, $endmonth){
		
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		$data = array(
			'work_experience_position' => "$positionname",
			'work_experience_company_name' => "$comapnyname",
			'work_experience_state' => "$state",
			'work_experience_city' => "$city",
			'work_experience_start_year' => "$startyear",
			'work_experience_start_month' => "$startmonth",
			'work_experience_end_year' => "$endyear",
			'work_experience_end_month' => "$endmonth",
			'work_experience_still_working' => NULL,
			'work_experience_updated_at' => "$current_time"
		);
		if ($this->db->where('work_experience_token', $u_token)
					->where('user_token', $user_token)
					->update('work_experience', $data)) {
			return true;
		}else{
			return false;
		}
	}

/*	delete section in model*/

	public function deleteexprencedatamodal($u_token, $user_token){
		if ($this->db->where('work_experience_token', $u_token)
				->where('user_token', $user_token)
				->delete('work_experience')) {
			return true;
		}else{
			return false;
		}

	}
	
	/*education section*/
	/*for education insert data*/

	/*for update education dta*/

	/*deleted*/
	public function deleteeducationdatamodal($delete_education_id, $user_token){
		if ($this->db->where('academic_qualifications_token', $delete_education_id)
				->where('user_token', $user_token)
				->delete('academic_qualifications')) {
			return true;
		}else{
			return false;
		}

	}

	public function updateeducationdatamodal($u_token, $user_token, $classname, $schoolname, $startingyear, $endingyear){
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		$data = array(
		    'academic_qualifications_course_name' => "$classname",
		    'academic_qualifications_school_name' => "$schoolname",
		    'academic_qualifications_start_year' => "$startingyear",
		    'academic_qualifications_end_year' => "$endingyear",
		    'academic_qualifications_updated_at' => "$current_time"
		);

		if ($this->db->where('academic_qualifications_token', $u_token)
					->where('user_token', $user_token)
					->update('academic_qualifications', $data)) {
			return true;
		}else{
			return false;
		}
		
	}

	public function geteducationdataforfetch($education_id, $user_token){
		$query = $this->db->where('academic_qualifications_token', $education_id)
						->where('user_token', $user_token)
						->get('academic_qualifications');
		if ($query->num_rows()>0) {
			
			return $query->result();
			
		}else{
			return false;
		}
	}

	public function getedudatamodel($token){
		$query = $this->db->where('user_token', $token)
						->get('academic_qualifications');
		if ($query->num_rows()>0) {
			
			return $query->result();
			
		}else{
			return false;
		}
	}


	public function inserteducationmodel($token, $user_token, $classname, $schoolname, $startingyear, $endingyear){
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));

		$data = array(
			'academic_qualifications_token' => "$token",
		    'user_token' => "$user_token",
		    'academic_qualifications_course_name' => "$classname",
		    'academic_qualifications_school_name' => "$schoolname",
		    'academic_qualifications_start_year' => "$startingyear",
		    'academic_qualifications_end_year' => "$endingyear",
		    
		    'academic_qualifications_created_at' => "$current_time"
		);
		return $this->db->insert('academic_qualifications', $data);
		
	}


	/*for preferenrces*/

	public function getprefrencedataforfetch($prefrence_token, $user_token){
		$query = $this->db->where('preferences_token', $prefrence_token)
						->where('user_token', $user_token)
						->get('employee_preferences');
		if ($query->num_rows()>0) {
			
			return $query->result();
			
		}else{
			return false;
		}
	}

	public function getpreferencemodel($token){
		$query = $this->db->where('user_token', $token)
						->get('employee_preferences');
		if ($query->num_rows()>0) {
			
			return $query->result();
			
		}else{
			return false;
		}
	}

	public function insertperferancesmodeldata($token, $user_token, $preposition, $jobtype, $state, $city, $jobindustry, $presalary, $presalary1){
		/*return true;*/
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));




		$da = $this->db->where('user_token', $user_token)
				->get('employee_preferences');
		if ($da->num_rows() > 0) {
			
			return false;
			
		}else{
			$dataabc = array(
				'preferences_token' => "$token",
		        'user_token' => "$user_token",
		        'preferences_position' => "$preposition",
		        'preferences_job_type' => "$jobtype",
		        'preferences_location' => "$state",
		        'preferances_city' => "$city",
		        'preferences_business_type' => "$jobindustry",
		        'preferences_salary' => "$presalary",
		        'preferances_salary_year' => "$presalary1",
			);
			return $this->db->insert('employee_preferences', $dataabc);
		}
	}

	public function updateperferancesmodeldata($user_token, $preposition, $jobtype, $state, $city, $jobindustry, $presalary, $presalary1){
		
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		$data = array(
		    'preferences_position' => "$preposition",
		    'preferences_job_type' => "$jobtype",
		    'preferences_location' => "$state",
		    'preferances_city' => "$city",
		    'preferences_business_type' => "$jobindustry",
		    'preferences_salary' => "$presalary1",
		    'preferances_salary_year' => "$presalary",
		    'preferences_updated_at' => "$current_time"
		);

		if ($this->db->where('user_token', $user_token)
					->update('employee_preferences', $data)) {
			return true;
		}else{
			return false;
		}
	}

	function save_upload($user_token,$image){
        $timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
        $data = array(
                'candidate_profile_adharcard'     => $image,
                'candidate_profile_adharcard_upload_time' => $current_time
            );  
        $result= $this->db->where('user_token',$user_token)
        					->update('candidate_profile', $data);
        return $result;
    }   

   public function getimageadhar($user_token){
   	$da = $this->db->where('user_token', $user_token)
				->get('candidate_profile');
		if ($da->num_rows() > 0) {
			return $da->result();
			
		}else{
			return false;
		}

   }
}
