<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }

        $this->load->view('admin/view-user',$data);
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
        $fname = $this->input->post('fname');
        $username = $this->input->post('username');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $type = $this->input->post('type');
        $password = $this->input->post('password');
        $password = $password;
        $key = $email;
        //check($value,$field,$table)
        $get_result = $this->Md->check($email, 'email', 'user');
        if ($get_result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                  
                                                <strong>' . $msg . ' </strong>									
						</div>');

              redirect('admin/user', 'refresh');
            return;
        }

        $password = $this->encrypt->encode($password, $key);
        $created = date('Y-m-d');
        $file = $data['file_name'];
        $user = array('image' => $file, 'fname' => $fname, 'lname' => $lname, 'username' => $username, 'type' => $type, 'password' => $password, 'email' => $email, 'type' => $type, 'active' => 'true', 'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($user, 'user');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

              redirect('admin/user', 'refresh');
            return;
        } else {
            unlink($data['full_path']);
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
               redirect('admin/user', 'refresh');
            return;
        }

        @unlink($_FILES[$file_element_name]);
         redirect('admin/user', 'refresh');
        return;
    }

    public function edit() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(3);


        $query = $this->Md->get('id', $id, 'profile');

        if ($query) {
            $data['profile'] = $query;
        } else {
            $data['profile'] = array();
        }

        $this->load->view('admin/edit-profile', $data);
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $lname = $this->input->post('lname');
        $fname = $this->input->post('fname');
        $type = $this->input->post('type');
        $active = $this->input->post('active');
        // function update($id, $data,$table)
        $user = array('username' => $username, 'lname' => $lname, 'fname' => $fname, 'type' => $type, 'active' => $active);
        $this->Md->update($id, $user, 'user');
       

    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(4);
              $this->Md->remove($id,'user','image');
        $query = $this->Md->delete($id, 'user');

        if ($this->db->affected_rows() > 0) {
            $msg = '<span style="color:red">Information Deleted </span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/user', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('admin/user', 'refresh');
            
        }
    }
  
  
}
