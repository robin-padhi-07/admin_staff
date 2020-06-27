<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobapplieddetails extends CI_Controller {

	
	public function index()
	{
		
		$this->load->view('inc/header');	
		$this->load->view('job_applied_details');
		$this->load->view('inc/footer');
		
	}
}
