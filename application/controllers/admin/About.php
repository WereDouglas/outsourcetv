<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
        
        $query = $this->Md->query("SELECT * FROM about");

        if ($query) {
            $data['abouts'] = $query;
        } else {
            $data['abouts'] = array();
        }

        $this->load->view('admin/view-about',$data);
    }

    public function create() {


        $this->load->helper(array('form', 'url'));
        $file_element_name = 'imgfile';
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = FALSE;
        $this->load->library('upload', $config);
        // $this->upload->initialize($config);
        if (!$this->upload->do_upload($file_element_name)) {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                  
                                                <strong>' . $msg . ' </strong>									
						</div>');
        }
        $data = $this->upload->data();      
        
        $created = date('Y-m-d');
        $file = $data['file_name'];
         $details = $this->input->post('details');
        $about = array('details'=>$details,'image' => $file,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($about, 'about');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

              redirect('admin/about', 'refresh');
            return;
        } else {
            unlink($data['full_path']);
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
               redirect('admin/about', 'refresh');
            return;
        }

        @unlink($_FILES[$file_element_name]);
         redirect('admin/about', 'refresh');
        return;
    }

   
    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');        
        $details = $this->input->post('details');      
        // function update($id, $data,$table)
        $about = array('details' => $details);
        $this->Md->update($id, $about, 'about');       

    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(4);
              $this->Md->remove($id,'about','image');
        $query = $this->Md->delete($id, 'about');

        if ($this->db->affected_rows() > 0) {
            $msg = '<span style="color:red">Information Deleted </span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/about', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/about', 'refresh');
            
        }
    }
  
  
}
