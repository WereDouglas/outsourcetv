<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
        
        $query = $this->Md->query("SELECT * FROM news");

        if ($query) {
            $data['news'] = $query;
        } else {
            $data['news'] = array();
        }

        $this->load->view('admin/view-news',$data);
    }

    public function create() {


        $this->load->helper(array('form', 'url'));
     
      
        $heading = $this->input->post('heading');
         $description = $this->input->post('description');
      
            
        $created = date('Y-m-d');
       
        $news = array('heading' => $heading,'description' => $description,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($news, 'news');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

              redirect('admin/news', 'refresh');
            return;
        } else {
         
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
               redirect('admin/news', 'refresh');
            return;
        }
     
         redirect('admin/news', 'refresh');
        return;
    }

  

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $heading = $this->input->post('heading');
         $description = $this->input->post('description');
        
        // function update($id, $data,$table)
        $news = array('heading' => $heading,'description'=>$description);
        $this->Md->update($id, $news, 'news');
       

    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(4);            
        $query = $this->Md->delete($id, 'news');

        if ($this->db->affected_rows() > 0) {
            $msg = '<span style="color:red">Information Deleted </span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/news', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/news', 'refresh');
            
        }
    }
  
  
}
