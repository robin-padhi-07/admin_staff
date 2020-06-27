<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/*the function for registration page show with validation*/

	public function index()
	{

		$this->load->library('form_validation');
		$this->load->model('Registermodel');

		$this->form_validation->set_rules('email', 'Email ID', 'required|trim|valid_email|is_unique[employee_user.user_email_id]', array(
                'is_unique'     => 'This %s already exists.'
        ));
		$this->form_validation->set_rules('number', 'Mobile Number', 'required|trim|numeric|min_length[10]|max_length[10]|is_unique[employee_user.user_mobile_number]', array(
                'is_unique'     => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('otp', 'OTP', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|alpha_numeric');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]|alpha_numeric');
		$this->form_validation->set_rules('checked', 'Checked', 'required');

		if ($this->form_validation->run())
		{
			if (isset($_SESSION['otp'])) {
				if ($this->input->post("otp")==$_SESSION['otp']) {
					
					$email = $this->input->post("email");
					$number = $this->input->post("number");
					$password = sha1($this->input->post("password"));
					$token1 = bin2hex(uniqid());
					$token2 = bin2hex(openssl_random_pseudo_bytes(16));
					$token = $token1.$token2;

					if ($this->Registermodel->newuserregister($email,$number,$password,$token)) {
						$userdata= array(
							'user_token'  => "$token",
							'user_email_id' => "$email",
							'loginin' => "loginin",
							
							);
						$this->session->set_userdata($userdata);
						redirect('/letsstart/');
					}
					
				}else{
					$data['errordata'] = "OTP invalid";
					$this->load->view('register', $data);
				}
			}else{
				$data['errordata'] = "Please click Get OTP link";
				$this->load->view('register', $data);
			}
		}
		else
		{
			$this->load->view('register');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/login/');

	}
}
