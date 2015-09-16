<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
        
        $query = $this->Md->query("SELECT * FROM user");
        $data['users'] = array();
        $data['services'] = array();
        if ($query) {
            $data['users'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM service");

        if ($query) {
            $data['services'] = $query;
        } 

        $this->load->view('pages/home',$data);
    }
     public function register() {
        
        $query = $this->Md->query("SELECT * FROM user");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }

        $this->load->view('pages/register',$data);
    }
    public function jobs()
	{
		

		$this->load->view('pages/jobs');

	}
        public function services()
	{
		$this->load->view('pages/services');

	}
        public function equipment()
	{
		
		$this->load->view('pages/equipment');

	}
        public function about()
	{
		$this->load->view('pages/about');

	}
        public function contact()
	{
		$this->load->view('pages/contact');

	}
         public function login()
	{
		$this->load->view('pages/login');

	}

  

  
  
  
}
