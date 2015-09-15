<?php

class Login extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
	}



	public function index()
	{
		$data['title'] = 'login';

		$this->load->view('templates/htmlstart', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/login', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/htmlend', $data);

	}


	public function authenticate()
	{

	}





}
