<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mjob extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
         $data['services'] = array();
         $query = $this->Md->query("SELECT *,user.lname,user.fname,user.image,user.country ,memberjob.id AS id FROM user LEFT OUTER JOIN memberjob ON user.id = memberjob.userID WHERE memberjob.userID IS NOT NULL");
        // var_dump($query);
        if ($query) { $data['jobs'] = $query;  }

        $this->load->view('admin/view-mjob',$data);
    }

   

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(4);            
        $query = $this->Md->delete($id, 'memberjob');

        if ($this->db->affected_rows() > 0) {
            $msg = '<span style="color:red">Information Deleted </span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/mjob', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/mjob', 'refresh');
            
        }
    }
  
  
}
