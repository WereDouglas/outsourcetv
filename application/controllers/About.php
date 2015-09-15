<?php

class About extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
	}



	public function index($page = 'about')
	{
		$data['title'] = $page;

		$this->load->view('templates/htmlstart', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/htmlend', $data);

	}
}
