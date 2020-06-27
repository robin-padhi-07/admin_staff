<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginotp extends CI_Controller {

	
	public function index()
	{
		$this->load->view('loginotp');
		
	}

	public function otplogin(){
		$this->load->model('Loginmodel');
		if (isset($_SESSION['otp']) && isset($_SESSION['number']) && empty($this->input->post("b"))) {

			if ($this->input->post("b")==$_SESSION['otp']) {
				if ($this->Loginmodel->otpchecklogin($_SESSION['number'])) {
					$userdata= array(
						'user_token'  => "$token",
						'user_email_id' => "$email",
						'loginin' => "loginin",
					);
					$this->session->set_userdata($userdata);
					redirect('/letsstart/');
				}
			}else{
				$data['errordata'] = "OTP invalid1";
				
			}
		}else{
			echo $data['errordata'] = "Please click Get OTP link";
		}
	}
	
	/*public function loginuser(){
		$this->load->library('form_validation');
		$this->load->model('Loginmodel');

		
		if (is_numeric($this->input->post("username"))) {
			$this->form_validation->set_rules('username', 'username', 'required|trim|numeric|min_length[10]|max_length[10]');
		}else{
			$this->form_validation->set_rules('username', 'username', 'required|trim|valid_email');
		}
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|alpha_numeric');
        if ($this->form_validation->run()){

        	$username = $this->input->post("username");
			
			$password = sha1($this->input->post("password"));

			if ($data = $this->Loginmodel->loginmodeldata($username,$password)) {
				foreach ($data as $value) {
					$data= array(
	                   'user_token'  => $value->user_token,
	                   'user_email_id'     => $value->user_email_id
               		);
				}

				
				$this->session->set_userdata($data);

				redirect('/letsstart/');

			}else{
				
				$data['error'] =  "Login field";
				$this->load->view('login', $data);
				
			}
        }else{
			$data['error'] = "Login field";
			$this->load->view('login', $data);
		}
	}*/
}
