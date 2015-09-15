<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
        
        $query = $this->Md->query("SELECT * FROM contact");

        if ($query) {
            $data['contacts'] = $query;
        } else {
            $data['contacts'] = array();
        }

        $this->load->view('admin/view-contact',$data);
    }

    public function create() {

        $this->load->helper(array('form', 'url'));
     
      
        $line1 = $this->input->post('line1');
        $line2 = $this->input->post('line2');
        $line3 = $this->input->post('line3');
        $line4 = $this->input->post('line4');
      
            
        $created = date('Y-m-d');
       
        $contact = array('line1' => $line1,'line2' => $line2,'line3' => $line3,'line4' => $line4,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($contact, 'contact');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

              redirect('admin/contact', 'refresh');
            return;
        } else {
         
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
               redirect('admin/contact', 'refresh');
            return;
        }
     
         redirect('admin/contact', 'refresh');
        return;
    }

  

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $line1 = $this->input->post('line1');
        $line2 = $this->input->post('line2');
        $line3 = $this->input->post('line3');
        $line4 = $this->input->post('line4');
        $contact = array('line1' => $line1,'line2' => $line2,'line3' => $line3,'line4' => $line4,'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $contact, 'contact');
       
    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(4);            
        $query = $this->Md->delete($id, 'contact');

        if ($this->db->affected_rows() > 0) {
            $msg = '<span style="color:red">Information Deleted </span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/contact', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/contact', 'refresh');
            
        }
    }
  
  
}
