<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->view('login');
		
	}


	public function loginuser(){
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
	}
}
