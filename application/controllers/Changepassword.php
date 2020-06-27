<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {

	
	public function index()
	{
		$this->load->library('form_validation');
		$this->load->model('Loginmodel');

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|alpha_numeric');
        $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|trim|min_length[8]|alpha_numeric|matches[password]');
        if ($this->form_validation->run()){
			
			$password = sha1($this->input->post("password"));
			$a = base64_decode($this->input->post("a"));

			if ($this->Loginmodel->change_password($password, $a)) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" id="successMessage">Password change successfully</div>');
				$this->load->view('changepassword');
				?>
				<script type="text/javascript">
					setTimeout(function () {
					   //Redirect with JavaScript
					   window.location.href= "<?php echo base_url('/login/'); ?>";
					}, 3000);
				</script>
				<?php

			}else{
				
				$data['error']="Password error";

				$this->load->view('changepassword', $data);
			}
        }else{
			$this->load->view('changepassword');
		}
	}
}
