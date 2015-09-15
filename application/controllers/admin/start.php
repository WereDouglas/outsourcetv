<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
	}


 public function index() {
      
      
        $this->load->view('admin/index');
    }
        public function admin($page = 'home')
	{
		$data['title'] = $page;

		$this->load->view('templates/htmlstart', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/htmlend', $data);

	}
        
        public function home() {
      
      
        $this->load->view('admin/start');
    }
}
