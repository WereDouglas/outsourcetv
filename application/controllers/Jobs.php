<?php

class Jobs extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
	}



	public function index()
	{
		$data['title'] = 'jobs';

		$this->load->view('templates/htmlstart', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/jobs', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/htmlend', $data);

	}


	public function view($id)
	{
		$data['title'] = 'jobs';
		$data['job_id'] = $id;

		$this->load->view('templates/htmlstart', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/jobs-detail', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/htmlend', $data);

	}





}
