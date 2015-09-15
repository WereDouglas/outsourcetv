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

        $query = $this->Md->query("SELECT * FROM user");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }

        $this->load->view('pages/user-add-service', $data);
    }

    public function item() {

        $query = $this->Md->query("SELECT * FROM user");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }

        $this->load->view('pages/user-add-item', $data);
    }

    public function job() {

        $this->load->view('pages/user-add-job', $data);
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

    public function login() {


        $this->load->helper(array('form', 'url'));

        $email = $this->input->post('email');
        $password_now = $this->input->post('password');
        echo  $key = $email;


        $result = $this->Md->query("SELECT * FROM user WHERE email='" . $email . "'");
        if (count($result) > 0) {

            var_dump($result);
            foreach ($result as $res) {
              echo ' '.$res->password;
                echo ' '.$res->email;
                echo '<br>';
                 echo  $passworded = $this->encrypt->decode($res->password,$res->email);
                
                echo $passworded . ' is equal ' . $password_now;
                return;
                if ($password_now == $passworded) {
                    $newdata = array(
                        'id' => $res->id,
                        'name' => $res->fname.' '.$res->lname.' ',
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
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-error"> <strong>! invalid password</strong></div>');
                    redirect('home/login', 'refresh');
                    return;
                }
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error"> <strong>! invalid password</strong></div>');
            redirect('home/login', 'refresh');
        }
    }

}
