<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
        
        $query = $this->Md->query("SELECT * FROM transaction");

        if ($query) {
            $data['transactions'] = $query;
        } else {
            $data['transactions'] = array();
        }

        $this->load->view('admin/view-transaction',$data);
    }

    public function create() {


        $this->load->helper(array('form', 'url'));
     
      
        $name = $this->input->post('name');
      
        //check($value,$field,$table)
        $get_result = $this->Md->check($name, 'name', 'transaction');
        if ($get_result) {
            $msg = "Transaction already registered";
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                  
                                                <strong>' . $msg . ' </strong>									
						</div>');

              redirect('admin/transaction', 'refresh');
            return;
        }

     
        $created = date('Y-m-d');
       
        $transaction = array('name' => $name,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($transaction, 'transaction');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

              redirect('admin/transaction', 'refresh');
            return;
        } else {
         
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
               redirect('admin/transaction', 'refresh');
            return;
        }
     
         redirect('admin/transaction', 'refresh');
        return;
    }

  

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        
        // function update($id, $data,$table)
        $transaction = array('name' => $name);
        $this->Md->update($id, $transaction, 'transaction');
       

    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(4);            
        $query = $this->Md->delete($id, 'transaction');

        if ($this->db->affected_rows() > 0) {
            $msg = '<span style="color:red">Information Deleted </span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/transaction', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/transaction', 'refresh');
            
        }
    }
  
  
}
