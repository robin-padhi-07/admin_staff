<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forget extends CI_Controller {

	
	public function index()
	{
		$this->load->library('form_validation');
		$this->load->model('Forgetmodel');

		$this->form_validation->set_rules('mo', 'Mobile Number', 'required|trim|numeric|min_length[10]|max_length[10]');

		if ($this->form_validation->run())
		{
			$MobileNo = $firstname = $this->input->post("mo");
			if ($this->Forgetmodel->forgetmodeldata($MobileNo)) {
				echo $data['msg']="success";

			}else{
				echo $data['error']="This number is not registered";
			}
		}else{
			$this->load->view('forget');
		}

	}

	public function otperror(){
		$MobileNo = $this->input->post("num");
		$otp = $this->input->post("o");
		/*require_once(APPPATH.'controllers/Otp_function.php'); 
		$oHome =  new Otp_function();
		$oHome->forgetpasswordotp($MobileNo);*/
		if ($otp==$_SESSION['otp']) {
			$this->session->set_userdata("mobileno","$MobileNo");
			echo $data['msg'] = "Success";
			/*redirect('/changepassword/');*/
		}else{
			echo $data['errordata'] = "OTP Invalid";
			/*$this->load->view('forget', $data);*/
		}

		
	}

}
