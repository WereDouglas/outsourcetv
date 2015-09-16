<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {

        parent::__construct();
        // error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('home', 'refresh');
    }

    public function index() {

        $query = $this->Md->query("SELECT * FROM user");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }

        $this->load->view('pages/user-add-service', $data);
    }

    public function service() {

        $query = $this->Md->query("SELECT * FROM service");

        if ($query) {
            $data['services'] = $query;
        } else {
            $data['services'] = array();
        }
        $query = $this->Md->query("SELECT * FROM memberservice WHERE userID='".$this->session -> userdata('id')."'");

        if ($query) {
            $data['serv'] = $query;
        } else {
            $data['serv'] = array();
        }
        

        $this->load->view('pages/user-add-service', $data);
    }

    public function create_service() {


        $this->load->helper(array('form', 'url'));
        $userID = $this->session -> userdata('id');
        $company = $this->input->post('company');
        $contact = $this->input->post('contact');
        $country = $this->input->post('country');
        $telephone = $this->input->post('telephone');
        $email = $this->input->post('email');
        $website = $this->input->post('website');
        $details = $this->input->post('details');
        $service = $this->input->post('service');
        $active = 'false';

        $created = date('Y-m-d');

        $services = array('company' => $company,'userID'=>$userID, 'contact' => $contact, 'country' => $country, 'telephone' => $telephone, 'email' => $email, 'website' => $website, 'details' => $details, 'service' => $service, 'active' => $active, 'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($services, 'memberservice');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">     
                                                <strong>
                                                information submitted	</strong>									
						</div>');

            redirect('home', 'refresh');
            return;
        } else {
            unlink($data['full_path']);
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
            redirect('home', 'refresh');
            return;
        }

        @unlink($_FILES[$file_element_name]);
        redirect('home', 'refresh');
        return;
    }
     public function create_job() {


        $this->load->helper(array('form', 'url'));
        $userID = $this->session -> userdata('id');
        $type = $this->input->post('type');
        $title = $this->input->post('title');       
        $details = $this->input->post('details');
       

        $created = date('Y-m-d');

        $jobs = array('userID'=>$userID,'type' => $type, 'title' => $title, 'details' => $details,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($jobs, 'memberjob');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">     
                                                <strong>
                                                information submitted	</strong>									
						</div>');

            redirect('home/jobs', 'refresh');
            return;
        } else {
          
            $this->session->set_flashdata('msg', '<div class="alert alert-error">   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
            redirect('home', 'refresh');
            return;
        }       
        redirect('home/jobs', 'refresh');
        return;
    }


    public function item() {
              $query = $this->Md->query("SELECT * FROM transaction");

        if ($query) {
            $data['trans'] = $query;
        } else {
            $data['trans'] = array();
        }
        $query = $this->Md->query("SELECT * FROM equipment");

        if ($query) {
            $data['equip'] = $query;
        } else {
            $data['equip'] = array();
        }
        $query = $this->Md->query("SELECT * FROM service");

        if ($query) {
            $data['services'] = $query;
        } else {
            $data['services'] = array();
        }

        $this->load->view('pages/user-add-item', $data);
    }

    public function job() {
         $query = $this->Md->query("SELECT * FROM service");

        if ($query) {
            $data['services'] = $query;
        } else {
            $data['services'] = array();
        }
        $query = $this->Md->query("SELECT * FROM memberjob");

        if ($query) {
            $data['jobs'] = $query;
        } else {
            $data['jobs'] = array();
        }

        $this->load->view('pages/user-add-job',$data);
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
                                                <strong>User already registered </strong>									
						</div>');

            redirect('user', 'refresh');
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
                                                Registration successful please continue to login</strong>									
						</div>');

            redirect('home/login', 'refresh');
            return;
        } else {
            unlink($data['full_path']);
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
            redirect('user', 'refresh');
            return;
        }

        @unlink($_FILES[$file_element_name]);
        redirect('user', 'refresh');
        return;
    }
    
     public function create_item() {


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
        $transaction = $this->input->post('transaction');
        $price = $this->input->post('price');       
        $details = $this->input->post('details');
        $userID = $this->session -> userdata('id');       
        $created = date('Y-m-d');        
        $file = $data['file_name'];
        
        $items = array('image' => $file, 'transaction' => $transaction, 'userID'=>$userID,'price' => $price, 'details' => $details, 'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($items, 'equipment');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                Registration successful please continue to login</strong>									
						</div>');

            redirect('home/item', 'refresh');
            return;
        } else {
            unlink($data['full_path']);
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
             redirect('user/item', 'refresh');
            return;
        }

        @unlink($_FILES[$file_element_name]);
       redirect('user/item', 'refresh');
        return;
    }

    public function login() {

        echo $this->encrypt->decode('VomeUe66JTeQ09Z7zGCh0jXlYJJf6d6BMbCz3Ot5gHKaMLOJ5V', $this->input->post('email'));
        $this->load->helper(array('form', 'url'));

        $email = $this->input->post('email');
        $password_now = $this->input->post('password');
        echo $key = $email;
        // $password_now= $this->encrypt->encode($password,$email);

        $result = $this->Md->query("SELECT * FROM user WHERE email='" . $email . "'");
        if (count($result) > 0) {

            var_dump($result);
            foreach ($result as $res) {
                echo $DBpass = $res->password;
                echo '<br>';
                echo $DBemail = $res->email;
                echo '<br>';
                echo $DBnew = $this->encrypt->decode($DBpass, $DBemail);
                echo $password_now . ' is equal to ' . $DBnew . '<br>';


                $newdata = array(
                    'id' => $res->id,
                    'name' => $res->fname . ' ' . $res->lname . ' ',
                    'email' => $res->email,
                    'type' => $res->type,
                    'username' => $res->username,
                    'image' => $res->image,
                    'active' => $res->active,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
                redirect('home', 'refresh');
                return;
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error"> <strong>! invalid password</strong></div>');
            redirect('home/login', 'refresh');
        }
    }

}
