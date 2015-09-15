<?php

class Services extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
	}



	public function index()
	{
		$data['title'] = 'services';

		$this->load->view('templates/htmlstart', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/services', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/htmlend', $data);

	}


	public function camera_crew($id = NULL)
	{
		$data['title'] = 'services';

		$this->load->view('templates/htmlstart', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/camera-crew', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/htmlend', $data);

	}


	public function equipment_hire($id = NULL)
	{
		$data['title'] = 'services';

		$this->load->view('templates/htmlstart', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/equipment-hire', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/htmlend', $data);

	}


	public function outside_broadcast_facility($id = NULL)
	{
		$data['title'] = 'services';

		$this->load->view('templates/htmlstart', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/outside-broadcast-facility', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/htmlend', $data);

	}










}
