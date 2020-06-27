<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobapplied extends CI_Controller {

	
	public function index()
	{
		
		$this->load->view('inc/header');	
		$this->load->view('job_applied');
		$this->load->view('inc/footer');
		
	}
}
