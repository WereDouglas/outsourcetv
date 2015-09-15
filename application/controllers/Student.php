<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
        // $query = $this->MD->show('metar');
        //  var_dump($query);

        $query = $this->Md->query("SELECT * FROM student where approved=''");
        if ($query) {
            $data['students'] = $query;
        } else {
            $data['students'] = array();
        }
        $this->load->view('view-applicant', $data);
    }

    public function recieved() {
        $this->load->helper(array('form', 'url'));
        $id = trim($this->input->post('id'));
        $actives = trim($this->input->post('actives'));
        if ($actives == "True") {
            $active = "False";
        }
        if ($actives == "False") {
            $active = "True";
        }

        $data = array('active' => $active,);
        // $this->MD->update($id, $student, 'student');
        $this->Md->update($id, $data, 'remittance');
        echo '' . $id;
    }

    public function refunded() {
        $this->load->helper(array('form', 'url'));
        $id = trim($this->input->post('id'));
        $actives = trim($this->input->post('actives'));
        if ($actives == "True") {
            $active = "False";
        }
        if ($actives == "False") {
            $active = "True";
        }

        $data = array('active' => $active,);
        // $this->MD->update($id, $student, 'student');
        $this->Md->update($id, $data, 'refund');
        echo '' . $id;
    }

    public function authenticate() {

        if ($this->session->userdata('name') != "") {
            //  echo $this->session->userdata('name');
            $this->load->view('student');
            return;
        }


        $this->load->helper(array('form', 'url'));
        $email = $this->input->post('email');
        $password_now = $this->input->post('password');

        $key = $email;
        $get_result = $this->Md->check($email, 'email', 'studentinfo');
        if (!$get_result) {
            // echo 'here';
            //$this->session->set_flashdata('msg', 'Welcome'.$email);
            //get($field,$value,$table)
            $result = $this->Md->get('email', $email, 'studentinfo');
            // var_dump($result);
            foreach ($result as $res) {
                $key = $email;
                $password = $this->encrypt->decode($res->password, $key);

                if ($password_now == $password) {

                    $newdata = array(
                        'id' => $res->id,
                        'name' => $res->name,
                        'email' => $res->email,
                        'image' => $res->image,
                        'approved' => $res->approved,
                        'contact' => $res->contact,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($newdata);

                    $this->load->view('student');
                    return;
                } else {
                    $this->session->set_flashdata('msg', 'Login Invalid user');
                    //  redirect('/student/authenticate', 'refresh');
                    echo $this->session->userdata('name');
                    $this->load->view('login');
                    return;
                }
            }
        } else {
            $this->session->set_flashdata('msg', 'Invalid email ');
            $this->load->view('login');
            // return;
        }
    }

    public function me() {


        $studentID = $this->session->userdata('id');

        $query = $this->Md->get('id', $studentID, 'studentinfo');

        if ($query) {
            $data['profile'] = $query;
        } else {
            $data['profile'] = array();
        }

        $query = $this->Md->get('studentID', $studentID, 'application');

        if ($query) {
            $data['application'] = $query;
        } else {
            $data['application'] = array();
        }
        $query = $this->Md->get('studentID', $studentID, 'course');

        if ($query) {
            $data['course'] = $query;
        } else {
            $data['course'] = array();
        }

        $this->load->view('view-me', $data);
    }

    public function approved() {
        // $query = $this->MD->show('metar');
        //  var_dump($query);

        $query = $this->Md->query("SELECT * FROM studentinfo where approved='Yes'");
        if ($query) {
            $data['students'] = $query;
        } else {
            $data['students'] = array();
        }
         $this->session->set_flashdata('msg', 'approved');
        $this->load->view('view-applicant', $data);
    }

    public function recover() {
         
         $query = $this->Md->query("SELECT *,(SELECT sum(refund.amount)FROM refund WHERE refund.studentID = studentinfo.id) AS debit,studentinfo.id as id FROM studentinfo inner join course ON studentinfo.id = course.studentID ");
        if ($query) {
            $data['students'] = $query;
        } else {
            $data['students'] = array();
        }
      
        $this->load->view('view-recover', $data);
    }

    public function applications() {
        // $query = $this->MD->show('metar');
        //  var_dump($query);

        $query = $this->Md->query("SELECT * FROM studentinfo where approved='none' ");
        if ($query) {
            $data['students'] = $query;
        } else {
            $data['students'] = array();
        }
         $this->session->set_flashdata('msg', '');
        $this->load->view('view-applicant', $data);
    }

    public function remit() {
        // $query = $this->MD->show('metar');
        //  var_dump($query);

        $query = $this->Md->query("SELECT *,(SELECT sum(remittance.amount)FROM remittance WHERE remittance.studentID = studentinfo.id) AS credit FROM studentinfo WHERE approved='Yes'");
        if ($query) {
            $data['students'] = $query;
        } else {
            $data['students'] = array();
        }
        $this->load->view('remit', $data);
    }
     public function employement() {
       
           $studentID = $this->session->userdata('id');


        $query = $this->Md->get('id', $studentID, 'studentinfo');

        if ($query) {
            $data['profile'] = $query;
        } else {
            $data['profile'] = array();
        }
        $this->load->view('new-employement', $data);
    }


    public function payment() {
        // $query = $this->MD->show('metar');
        //  var_dump($query);
      //  $query = $this->Md->query("SELECT *,(SELECT sum(remittance.amount)FROM remittance WHERE remittance.studentID = studentinfo.id) AS credit FROM studentinfo WHERE approved='Yes'");
       
        $query = $this->Md->query("SELECT *,(SELECT sum(refund.amount)FROM refund WHERE refund.studentID = studentinfo.id) AS debit,studentinfo.id as id FROM studentinfo inner join course ON studentinfo.id = course.studentID ");
        if ($query) {
            $data['students'] = $query;
        } else {
            $data['students'] = array();
        }
        $this->load->view('view-payment-student', $data);
    }

    public function image() {

        $this->load->helper(array('form', 'url'));
     
        $studentID = $this->session->userdata('session');
        //$studentID = 6;


        if ($studentID != "") {

            $file_element_name = 'imgfile';
            $config['upload_path'] = 'uploads/';
            // $config['upload_path'] = '/uploads/';
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                echo $msg = $this->upload->display_errors('', '');
            }

            $data = $this->upload->data();

            $file = $data['file_name'];
            $user = array('image' => $file);
            $this->Md->update($studentID, $user, 'studentinfo');
            // $file_id = $this->Md->save($user, 'users');
            echo '<div class="alert alert-error">                                                  
                                                <strong>Image uploaded successfully </strong>									
						</div>';
        } else {

            echo '<div class="alert alert-error">                                                  
                                                <strong>No valid registration process/session </strong>									
						</div>';
        }

        // $this->load->view('image', $data);
    }

    public function denied() {
        // $query = $this->MD->show('metar');
        //  var_dump($query);

        $query = $this->Md->query("SELECT * FROM studentinfo where approved='No'");
        if ($query) {
            $data['students'] = $query;
        } else {
            $data['students'] = array();
        }
          $this->session->set_flashdata('msg', 'denied');
        $this->load->view('view-applicant', $data);
    }

    public function register() {
        $this->load->helper(array('form', 'url'));
        $query = $this->Md->show('university');

        if ($query) {
            $data['unis'] = $query;
        } else {
            $data['unis'] = array();
        }
        $this->load->view('new-register',$data);
    }

    public function profile() {
        $this->load->view('student-profile');
    }

    public function save() {

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
            $this->load->view('student-profile');
            return;
        } else {

            $data = $this->upload->data();

            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $oname = $this->input->post('oname');
            $gender = $this->input->post('gender');
            $contact = $this->input->post('contact');
            $email = $this->input->post('email');
            $social = $this->input->post('social');
            $password = $this->input->post('password');
            $password = $password;
            $key = $email;
            //check($value,$field,$table)
            $get_result = $this->Md->check($email, 'email', 'student');
            if (!$get_result) {

                $query = $this->Md->get('email', $email, 'student');

                if ($query) {
                    $data['profile'] = $query;
                } else {
                    $data['profile'] = array();
                }

                $this->load->view('student-qualification', $data);
                return;
            }



            $password = $this->encrypt->encode($password, $key);
            $created = date('Y-m-d');
            $file = $data['file_name'];
            $student = array('image' => $file, 'fname' => $fname, 'lname' => $lname, 'oname' => $oname, 'social' => $social, 'gender' => $gender, 'contact' => $contact, 'email' => $email, 'approved' => 'none', 'password' => $password, 'created' => date('Y-m-d H:i:s'));
            $id = $this->Md->save($student, 'student');
            if ($id) {
                $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');
                $query = $this->Md->get('id', $id, 'student');

                if ($query) {
                    $data['profile'] = $query;
                } else {
                    $data['profile'] = array();
                }

                $this->load->view('student-qualification', $data);
                return;
            } else {
                unlink($data['full_path']);
                $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
                $this->load->view('student-profile');
                return;
            }
        }
        @unlink($_FILES[$file_element_name]);
        $this->load->view('student-qualification');
    }

    public function personal() {

        $this->load->helper(array('form', 'url'));

        $file_element_name = 'imgfile';
        $posts = $this->input->post('posts');

        $config['upload_path'] = 'uploads';

        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = FALSE;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);
        if (!$this->upload->do_upload($file_element_name)) {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }

        $data = $this->upload->data();
        $personal = new stdClass();
        //foreach($posts as $item){
        foreach ($posts as $key => $value) {

            $personal->$value['name'] = $value['value'];
        }
        $personal = json_encode($personal);
        $password = $this->input->post('password');
        $email = $this->input->post('email');

        $name = $this->input->post('name');
        $gender = $this->input->post('gender');
        $contact = $this->input->post('contact');
        $age = $this->input->post('age');

        $key = $email;
        $password = $this->encrypt->encode($password, $key);
        $created = date('Y-m-d');
        $file = $data['file_name'];


        $get_result = $this->Md->check($email, 'email', 'studentinfo');
        if (!$get_result) {

            echo '<div class="alert alert-error">                                                  
                                                <strong> CONTINUE TO NEXT SECTION YOU ALREADY  REGISTERED </strong>									
						</div>';
            
              $get_result = $this->Md->get('email', $email, 'studentinfo');
              if ($get_result) {
                foreach ($get_result as $loop) {

                    $id = $loop->id ;
                }
             }
                   $newdata = array('session' => $id);
                    $this->session->set_userdata($newdata);
            return;
        } else {


            $student = array('image' => $file, 'name' => $name, 'gender' => $gender, 'age' => $age, 'personal' => $personal, 'contact' => $contact, 'email' => $email, 'approved' => 'none', 'password' => $password, 'created' => date('Y-m-d H:i:s'));
            $id = $this->Md->save($student, 'studentinfo');
            if ($id) {
                if (!$this->session->userdata('session')) {

                    $newdata = array('session' => $id);
                    $this->session->set_userdata($newdata);
                      echo '<div class="alert alert-info">                                                  
                                                <strong>Information submitted continue to next section </strong>									
						</div>';
            return;
                } else {
                    $session = $this->session->userdata('session');
                       echo '<div class="alert alert-error">                                                  
                                                <strong>Information already submitted continue to next section </strong>									
						</div>';
                }
            }
        }
    }

    public function parents() {
        $this->load->helper(array('form', 'url'));
        $id = $this->session->userdata('session');
        $studentID = $id;

        if ($id != "") {
            $file_element_name = 'imgfile';
            $posts = $this->input->post('posts');

            $personal = new stdClass();
            //foreach($posts as $item){
            foreach ($posts as $key => $value) {

                $personal->$value['name'] = $value['value'];
            }
            $personal = json_encode($personal);

            $personal = array('parent' => $personal, 'created' => date('Y-m-d H:i:s'));
            $this->Md->update($id, $personal, 'studentinfo');
            echo '<div class="alert alert-error">                                                  
                                                <strong>INFORMATION SUBMITTED</strong>									
						</div>';
        }
    }

    public function institute() {

        $id = $this->session->userdata('session');
        $studentID = $id;
        if ($id != "") {
            $this->load->helper(array('form', 'url'));

            $posts = $this->input->post('posts');

            $personal = new stdClass();
            //foreach($posts as $item){
            foreach ($posts as $key => $value) {

                $personal->$value['name'] = $value['value'];
            }
            $personal = json_encode($personal);
            $university = $this->input->post('university');
            $stdNo = $this->input->post('stdNo');

            $course = $this->input->post('course');
            $duration = $this->input->post('duration');
            $fees = $this->input->post('fees');
            $disabled = $this->input->post('disabled');
            $approved = $this->input->post('approved');
            $functional = $this->input->post('functional');
            $research = $this->input->post('research');
            $aid = $this->input->post('aid');
            $total = ($duration*($fees+$aid+$functional+$research));
             $yearpay = $this->input->post('yearpay');

            $yearstudy = $this->input->post('yearstudy');
            $yearadmitted = $this->input->post('yearadmitted');

            $created = date('Y-m-d');

            $get_result = $this->Md->check($studentID, 'studentID', 'course');
            if (!$get_result) {

                echo '<div class="alert alert-error">                                                  
                                                <strong>YOU ARE ALREADY  REGISTERED TO AN INSTITUTE </strong>									
						</div>';
                return;
            } else {


                $course = array('studentID' => $studentID,'yearpay'=>$yearpay, 'aid' => $aid, 'total' => $total, 'research' => $research, 'functional' => $functional, 'university' => $university, 'stdNo' => $stdNo, 'course' => $course, 'duration' => $duration, 'fees' => $fees, 'approved' => 'None', 'yearstudy' => $yearstudy, 'yearadmitted' => $yearadmitted, 'created' => date('Y-m-d H:i:s'));
                $id = $this->Md->save($course, 'course');
                $personal = array('institution' => $personal, 'created' => date('Y-m-d H:i:s'));
                $this->Md->update($id, $personal, 'studentinfo');
                echo '<div class="alert alert-error">                                                  
                                                <strong>INFORMATION SUBMITTED</strong>									
						</div>';
            }
        } else {

            echo '<div class="alert alert-error">                                                  
                                                <strong>No valid registration process/session </strong>									
						</div>';
        }
    }

    public function education() {

        $id = $this->session->userdata('session');
        $studentID = $id;
        if ($id != "") {
            $this->load->helper(array('form', 'url'));

            $posts = $this->input->post('posts');

            $personal = new stdClass();
            //foreach($posts as $item){
            foreach ($posts as $key => $value) {

                $personal->$value['name'] = $value['value'];
            }
            $personal = json_encode($personal);
            $instituteName = $this->input->post('instituteName');
            $index = $this->input->post('index');
            $yearcomplete = $this->input->post('yearcomplete');
            $gpa = $this->input->post('gpa');
            $fees = $this->input->post('fees');
            $sponsor = $this->input->post('sponsor');
            $relationship = $this->input->post('relationship');
            $approved = 'No';
            $created = date('Y-m-d');
            $education = array('studentID' => $studentID, 'sponsor' => $sponsor, 'relationship' => $relationship, 'instituteName' => $instituteName, 'index' => $index, 'gpa' => $gpa, 'fees' => $fees, 'approved' => $approved, 'yearcomplete' => $yearcomplete);
            $id = $this->Md->save($education, 'education');
            $personal = array('institution' => $personal, 'created' => date('Y-m-d H:i:s'));
            $this->Md->update($id, $personal, 'studentinfo');
            echo '<div class="alert alert-error">                                                  
                                                <strong>INFORMATION SUBMITTED</strong>									
						</div>';
            $get_result = $this->Md->get('studentID', $studentID, 'education');



            $message = '<div  >
             <table >

                    <tbody>  
                          
                        <tr>
                          
                          
                            <td >
                                <a href="#">Name</a>
                            </td>
                            <td >
                                <a href="#">Index</a>
                            </td>
                             <td >
                                <a href="#">GPA/Aggregates</a>
                            </td>
                             <td >
                                <a href="#">Fees per year</a>
                            </td>
                             <td >
                                <a href="#">Completion year</a>
                            </td>
                            
                        </tr>';
            if ($get_result) {
                foreach ($get_result as $loop) {

                    $message .= '<tr>
                           
                            <td  >' . $loop->instituteName . '</td>
                            <td >' . $loop->index . ' </td>
                            <td >' . $loop->gpa . '</td>
                            <td >' . $loop->fees . '</td>
                            <td >' . $loop->yearcomplete . '</td>
                     
                             </tr>   ';
                }
            }

            $message . '</tbody>
                </table>


                                                </div>
                                            </div>';

            echo $message;
        } else {

            echo '<div class="alert alert-error">                                                  
                                                <strong>No valid registration process/session </strong>									
						</div>';
        }
    }

    public function guarantee() {

        $id = $this->session->userdata('session');
        $studentID = $id;
        if ($id != "") {
            $this->load->helper(array('form', 'url'));

            $name = $this->input->post('name');
            $profession = $this->input->post('profession');
            $occupation = $this->input->post('occupation');
            $contact = $this->input->post('contact');



            $created = date('Y-m-d');
            $guarantee = array('studentID' => $studentID, 'name' => $name, 'profession' => $profession, 'occupation' => $occupation, 'contact' => $contact);
            $id = $this->Md->save($guarantee, 'guarantee');

            echo '<div class="alert alert-error">                                                  
                                                <strong>INFORMATION SUBMITTED</strong>									
						</div>';
            $get_result = $this->Md->get('studentID', $studentID, 'sibling');



            $message = '<div  >
             <table >

                    <tbody>  
                          
                        <tr>
                          
                          
                            <td >
                                <a href="#">Name</a>
                            </td>
                            <td >
                                <a href="#">Type</a>
                            </td>
                             <td >
                                <a href="#">School</a>
                            </td>
                             <td >
                                <a href="#">Study</a>
                            </td>
                             <td >
                                <a href="#">Fees</a>
                            </td>
                            
                        </tr>';
            if ($get_result) {
                foreach ($get_result as $loop) {

                    $message .= '<tr>
                           
                            <td  >' . $loop->sibName . '</td>
                            <td >' . $loop->sibType . ' </td>
                            <td >' . $loop->sibSchool . '</td>
                            <td >' . $loop->sibStudy . '</td>
                            <td >' . $loop->sibFees . '</td>
                     
                             </tr>   ';
                }
            }

            $message . '</tbody>
                </table>


                                                </div>
                                            </div>';

            echo $message;
        } else {

            echo '<div class="alert alert-error">                                                  
                                                <strong>No valid registration process/session </strong>									
						</div>';
        }
    }

    public function sibling() {

        $id = $this->session->userdata('session');
        $studentID = $id;
        if ($id != "") {
            $this->load->helper(array('form', 'url'));



            $sibName = $this->input->post('sibName');
            $sibType = $this->input->post('sibType');
            $sibSchool = $this->input->post('sibSchool');
            $sibStudy = $this->input->post('sibStudy');
            $sibFees = $this->input->post('sibFees');


            $created = date('Y-m-d');
            $siblings = array('studentID' => $studentID, 'sibName' => $sibName, 'sibType' => $sibType, 'sibSchool' => $sibSchool, 'sibStudy' => $sibStudy, 'sibFees' => $sibFees, 'created' => $created);
            $id = $this->Md->save($siblings, 'sibling');

            echo '<div class="alert alert-error">                                                  
                                                <strong>INFORMATION SUBMITTED</strong>									
						</div>';
            $get_result = $this->Md->get('studentID', $studentID, 'sibling');



            $message = '<div  >
             <table >

                    <tbody>  
                          
                        <tr>
                        <td >
                           <a href="#">Name</a>
                            </td>
                            <td >
                                <a href="#">Type</a>
                            </td>
                             <td >
                                <a href="#">School</a>
                            </td>
                             <td >
                                <a href="#">Study</a>
                            </td>
                             <td >
                                <a href="#">Fees</a>
                            </td>
                            
                        </tr>';
            if ($get_result) {
                foreach ($get_result as $loop) {

                    $message .= '<tr>
                           
                            <td  >' . $loop->sibName . '</td>
                            <td >' . $loop->sibType . ' </td>
                            <td >' . $loop->sibSchool . '</td>
                            <td >' . $loop->sibStudy . '</td>
                            <td >' . $loop->sibFees . '</td>
                     
                             </tr>   ';
                }
            }

            $message . '</tbody>
                </table>


                                                </div>
                                            </div>';

            echo $message;
        } else {

            echo '<div class="alert alert-error">                                                  
                                                <strong>No valid registration process/session </strong>									
						</div>';
        }
    }
    
    public function job() {

        $this->load->helper(array('form', 'url'));
          $studentID = $this->session->userdata('id');
        
        if ($studentID != "") {
            $job = $this->input->post('job'); 
          //  var_dump($job);

            $residential = new stdClass();

            foreach ($job as $obj) {
                $residential->{self::getCleanName($obj['name'])} = $obj['value'];
            }
            $resident = json_encode($residential);


            $student = array('employement' => $resident, 'created' => date('Y-m-d H:i:s'));
            $this->Md->update($studentID, $student, 'studentinfo');
            echo $studentID.'<div class="alert alert-error">                                                  
                                                <strong>INFORMATION UPDATED</strong>									
						</div>';
        } else {

            echo  $studentID.'<div class="alert alert-error">                                                  
                                                <strong>No valid registration process/session </strong>									
						</div>';
        }
    }
    
     public function view_job() {

        $this->load->helper(array('form', 'url'));
          $studentID = $this->uri->segment(3);
        //  echo ''.$studentID;
        $query = $this->Md->get('id', $studentID, 'studentinfo');

        if ($query) {
            $data['profile'] = $query;
        } else {
            $data['profile'] = array();
        }
        $this->load->view('view-employment', $data);
    }

    public function residential() {

        $this->load->helper(array('form', 'url'));
        $id = $this->session->userdata('session');
        if ($id != "") {
            $residential = $this->input->post('residential'); #
           // var_dump($residential);

            $resident = new stdClass();

//            foreach ($residential as $key => $value) {
//
//                $resident->$value['name'] = $value['value'];
//            }
            foreach ($residential as $obj) {
                $residential->{self::getCleanName($obj['name'])} = $obj['value'];
            }
            $resident = json_encode($resident);


            $student = array('resident' => $resident, 'created' => date('Y-m-d H:i:s'));
            $this->Md->update($id, $student, 'studentinfo');
            echo '<div class="alert alert-error">                                                  
                                                <strong>INFORMATION UPDATED</strong>									
						</div>';
        } else {

            echo '<div class="alert alert-error">                                                  
                                                <strong>No valid registration process/session </strong>									
						</div>';
        }
    }

    public static function GetCleanName($dirtyName) {
        switch ($dirtyName) { //reassign names of matched keys
            case 'fName':
                return 'First name';
                
            case 'lName':
                return 'Last name';
            case 'idType':
                return 'Identification Type';
            case 'oname':
                return 'Other name';
            case 'pobox':
                return 'Address';
            case 'married':
                return 'Marital status';
            case 'KinName':
                return 'Kin name';
            case 'KinContact':
                return 'Kin contact';
            case 'ContactNo':
                return 'Contact number';
            case 'ContactName':
                return 'Contact name';
            case 'ContactNo':
                return 'Contact number';
            case 'IDtype':
                return 'Identification type';
            case 'IDnumber':
                return 'Identification number';
            case 'stayingparent':
                return 'Staying with parents?';
            case 'familyresidence':
                return 'Type of family residence';
            case 'housetype':
                return 'Type of house';
            case 'medical':
                return 'where do you get our medication?';
            case 'transportmeans':
                return 'Family means of transport?';


            //add more as you see fit...
        }
        return $dirtyName; //return unknown keys as is
    }

    public function economic() {
        $this->load->helper(array('form', 'url'));
        $id = $this->session->userdata('session');
        $studentID = $id;

        if ($id != "") {
            $file_element_name = 'imgfile';
            $posts = $this->input->post('posts');

            $personal = new stdClass();
            //foreach($posts as $item){
            foreach ($posts as $key => $value) {

                $personal->$value['name'] = $value['value'];
            }
            $personal = json_encode($personal);

            $personal = array('economic' => $personal, 'created' => date('Y-m-d H:i:s'));
            $this->Md->update($id, $personal, 'studentinfo');
            echo '<div class="alert alert-error">                                                  
                                                <strong>INFORMATION SUBMITTED</strong>									
						</div>';
        }
    }

    public function check() {
        $this->load->helper(array('form', 'url'));
        $id = $this->session->userdata('session');
        $studentID = $id;

        if ($id != "") {

            $posts = $this->input->post('posts');

            $personal = new stdClass();
            //foreach($posts as $item){
            foreach ($posts as $key => $value) {

                $personal->$value['name'] = $value['value'];
            }
            $personal = json_encode($personal);

            $personal = array('check' => $personal, 'created' => date('Y-m-d H:i:s'));
            $this->Md->update($id, $personal, 'studentinfo');
            echo '<div class="alert alert-error">                                                  
                                                <strong>INFORMATION SUBMITTED</strong>									
						</div>';
        }
    }

    public function payout() {

        $this->load->helper(array('form', 'url'));

        $file_element_name = 'imgfile';

        $config['upload_path'] = 'uploads';

        $config['allowed_types'] = '*';
        $config['encrypt_name'] = FALSE;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);
        if (!$this->upload->do_upload($file_element_name)) {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                  
                                                <strong>' . $msg . ' </strong>									
						</div>');
            echo $msg;
            return;
        } else {

            $data = $this->upload->data();
            $studentID = $this->input->post('id');
            $dor = $this->input->post('dor');
            $method = $this->input->post('method');
            $amount = $this->input->post('amount');
            $comments = $this->input->post('comments');

            $created = date('Y-m-d');
            $user = 'Dennis Ogwang';
            $file = $data['file_name'];
            $student = array('proof' => $file, 'studentID' => $studentID, 'dor' => $dor, 'method' => $method, 'amount' => $amount, 'comment' => $comments, 'created' => $created, 'user' => $user, 'active' => 'False');
            $id = $this->Md->save($student, 'remittance');
            if ($id) {
                $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');
                $query = $this->Md->get('id', $studentID, 'studentinfo');

                if ($query) {

                    $query = $this->Md->get('id', $studentID, 'studentinfo');
                }

                if ($query) {
                    $data['profile'] = $query;
                } else {
                    $data['profile'] = array();
                }

                $query = $this->Md->get('studentID', $studentID, 'application');

                if ($query) {
                    $data['application'] = $query;
                } else {
                    $data['application'] = array();
                }

                $query = $this->Md->get('studentID', $studentID, 'remittance');

                if ($query) {
                    $data['remit'] = $query;
                } else {
                    $data['remit'] = array();
                }

                $query = $this->Md->get('studentID', $studentID, 'course');

                if ($query) {
                    $data['course'] = $query;
                } else {
                    $data['course'] = array();
                }

                $this->load->view('view-remit', $data);
                return;
            } else {
                unlink($data['full_path']);
                $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
                $this->load->view('student-profile');
                return;
            }
        }
        @unlink($_FILES[$file_element_name]);
        $this->load->view('student-qualification');
    }

    public function refunding() {

        $this->load->helper(array('form', 'url'));

        $file_element_name = 'imgfile';

        $config['upload_path'] = 'uploads';

        $config['allowed_types'] = '*';
        $config['encrypt_name'] = FALSE;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);
        if (!$this->upload->do_upload($file_element_name)) {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                  
                                                <strong>' . $msg . ' </strong>									
						</div>');
            echo $msg;
            return;
        } else {

            $data = $this->upload->data();
            $studentID = $this->input->post('id');
            $dor = $this->input->post('dor');
            $method = $this->input->post('method');
            $amount = $this->input->post('amount');
            $comments = $this->input->post('comments');

            $created = date('Y-m-d H:i:s');

            $file = $data['file_name'];
            $refund = array('proof' => $file, 'studentID' => $studentID, 'dor' => $dor, 'method' => $method, 'amount' => $amount, 'comment' => $comments, 'created' => $created, 'active' => 'False');
            $id = $this->Md->save($refund, 'refund');
            if ($id) {
                $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');
                $query = $this->Md->get('id', $studentID, 'student');

                if ($query) {

                    $query = $this->Md->get('id', $studentID, 'studentinfo');
                }

                if ($query) {
                    $data['profile'] = $query;
                } else {
                    $data['profile'] = array();
                }

                $query = $this->Md->get('studentID', $studentID, 'application');

                if ($query) {
                    $data['application'] = $query;
                } else {
                    $data['application'] = array();
                }

                $query = $this->Md->get('studentID', $studentID, 'refund');

                if ($query) {
                    $data['refund'] = $query;
                } else {
                    $data['refund'] = array();
                }

                $query = $this->Md->get('studentID', $studentID, 'course');

                if ($query) {
                    $data['course'] = $query;
                } else {
                    $data['course'] = array();
                }

                $this->load->view('view-refund', $data);
                return;
            } else {
                unlink($data['full_path']);
                $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
                $this->load->view('student-profile');
                return;
            }
        }
        @unlink($_FILES[$file_element_name]);
        $this->load->view('student-qualification');
    }

    public function address() {

        $this->load->helper(array('form', 'url'));

        $id = $this->input->post('id');
        $IDtype = $this->input->post('IDtype');
        $IDnumber = $this->input->post('IDnumber');
        $GN = $this->input->post('GuaranteeName');
        $GC = $this->input->post('GuaranteeContact');
        $GN2 = $this->input->post('GuaranteeName2');
        $GC2 = $this->input->post('GuaranteeContact2');
        $residence = $this->input->post('autocomplete');
        $country = $this->input->post('country');
        $physical = $this->input->post('physical');
        $region = $this->input->post('administrative_area_level_1');
        $city = $this->input->post('locality');

        if ($id != "") {
            $query = $this->Md->get('id', $id, 'student');
            if ($query) {
                $data['profile'] = $query;
            } else {
                $data['profile'] = array();
            }
            $this->load->view('student-contact', $data);
            return;
        }

        if ($GN == "" && $GN2 == "") {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                <strong> Your are missing vital information in your form</strong>									
						</div>');
            $query = $this->Md->get('id', $id, 'student');

            if ($query) {
                $data['profile'] = $query;
            } else {
                $data['profile'] = array();
            }
            $this->load->view('student-qualification', $data);
            return;
        }
        //check($value,$field,$table)

        $student = array('IDtype' => $IDtype, 'IDnumber' => $IDnumber, 'GuaranteeName' => $GN, 'GuaranteeContact' => $GC, 'GuaranteeName2' => $GN2, 'GuaranteeContact2' => $GC2, 'residence' => $residence, 'country' => $country, 'physical' => $physical, 'region' => $region, 'city' => $city);
        $this->Md->update($id, $student, 'student');

        $this->session->set_flashdata('msg', '<div class="alert alert-error">
                <strong> information submitted	</strong>									
						</div>');
        $query = $this->Md->get('id', $id, 'student');

        if ($query) {
            $data['profile'] = $query;
        } else {
            $data['profile'] = array();
        }
        $this->load->view('student-contact', $data);
        return;
        // $this->load->view('student-contact',$data);
    }

    public function validate() {

        $this->load->helper(array('form', 'url'));

        // $id = $this->input->post('id');
        $id = $this->input->post('id');
        // function update($id, $data,$table)

        $application = array('valid' => 'True');
        $this->Md->update($id, $application, 'application');
        $this->session->set_flashdata('msg', '<div class="alert alert-info"> <strong>
                                                 Information validated	</strong>									
						</div>');
    }

    public function validate_profile() {

        $this->load->helper(array('form', 'url'));

        // $id = $this->input->post('id');
        $id = $this->input->post('id');
        $comment = $this->input->post('comment');

        // function update($id, $data,$table)

        $application = array('valid' => 'True', 'comment' => $comment);
        $this->Md->update($id, $application, 'studentinfo');
        $this->session->set_flashdata('msg', '<div class="alert alert-info"> <strong>
                                                 Information validated	</strong>									
						</div>');
    }

    public function approve() {

        $this->load->helper(array('form', 'url'));

        // $id = $this->input->post('id');
        $id = $this->input->post('id');
        //echo   $id = 2;
        // function update($id, $data,$table)
        $studentID = $this->Md->query_single("select studentID from course where id = '" . $id . "'");



        $application = array('approved' => 'Yes');
        $this->Md->update($id, $application, 'course');
        $this->Md->update($studentID, $application, 'studentinfo');
        $this->session->set_flashdata('msg', '<div class="alert alert-info"> <strong>
                                                 Information validated	</strong>									
						</div>');
    }

    public function disapprove() {

        $this->load->helper(array('form', 'url'));

        // $id = $this->input->post('id');
        $id = $this->input->post('id');
        // function update($id, $data,$table)
        $studentID = $this->Md->query_single("select studentID from course where id = '" . $id . "'");
        $application = array('approved' => 'No');
        $this->Md->update($id, $application, 'course');
        $this->Md->update($studentID, $application, 'studentinfo');
        $this->session->set_flashdata('msg', '<div class="alert alert-info"> <strong>
                                                 Information validated	</strong>									
						</div>');
    }

    public function course() {

        $this->load->helper(array('form', 'url'));

        // $id = $this->input->post('id');
        $studentID = $this->input->post('id');
        $university = $this->input->post('university');
        $stdNo = $this->input->post('stdNo');
        $course = $this->input->post('course');
        $duration = $this->input->post('duration');
        $fees = $this->input->post('fees');
        $disabled = $this->input->post('disabled');


        if ($studentID == "") {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                <strong> Your are missing vital information in your form</strong>									
						</div>');

            $this->load->view('student-profile');
            return;
        }
        //check($value,$field,$table)

        $course = array('studentID' => $studentID, 'university' => $university, 'stdNo' => $stdNo, 'course' => $course, 'duration' => $duration, 'fees' => $fees, 'disabled' => $disabled);
        $this->Md->save($course, 'course');

        $this->session->set_flashdata('msg', '<div class="alert alert-error">
                <strong> information submitted	</strong>									
						</div>');
        $query = $this->Md->get('id', $studentID, 'studentinfo');

        if ($query) {
            $data['profile'] = $query;
        } else {
            $data['profile'] = array();
        }
        echo 'Done';
        $this->load->view('login');
        //return;
        // $this->load->view('student-contact',$data);
    }

    public function upload() {

        $id = $this->session->userdata('session');
        $studentID = $id;
        if ($id != "") {

            if (!empty($_FILES)) {
                $tempFile = $_FILES['file']['tmp_name'];
                $fileName = $_FILES['file']['name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $fileName;
                move_uploaded_file($tempFile, $targetFile);

// if you want to save in db,where here
// with out model just for example
// $this->load->database(); // load database
// $this->db->insert('file_table',array('file_name' => $fileName));
                $name = $fileName;
                $image = array('image' => $name, 'studentID' => $studentID, 'created' => date('Y-m-d H:i:s'), 'valid' => 'False');
                $this->Md->save($image, 'application');
                echo '<div class="alert alert-info">
                                                   
                                                <strong>
                                                  application  submitted	</strong>									
						</div>';
            }
        } else {

            echo '<div class="alert alert-error">                                                  
                                                <strong>No valid registration process/session </strong>									
						</div>';
        }
    }

    public function contact() {


        $this->load->view('student-contact');
    }

    public function view() {

        $this->load->helper(array('form', 'url'));
        $studentID = $this->uri->segment(3);


        $query = $this->Md->get('id', $studentID, 'studentinfo');

        if ($query) {
            $data['profile'] = $query;
        } else {
            $data['profile'] = array();
        }

        $query = $this->Md->get('studentID', $studentID, 'application');

        if ($query) {
            $data['application'] = $query;
        } else {
            $data['application'] = array();
        }
        $query = $this->Md->get('studentID', $studentID, 'course');

        if ($query) {
            $data['course'] = $query;
        } else {
            $data['course'] = array();
        }

        $this->load->view('view-student', $data);
    }

    public function student_remit() {

        $this->load->helper(array('form', 'url'));
        $studentID = $this->session->userdata('id');


        $query = $this->Md->get('id', $studentID, 'studentinfo');

        if ($query) {
            $data['profile'] = $query;
        } else {
            $data['profile'] = array();
        }

        $query = $this->Md->get('studentID', $studentID, 'application');

        if ($query) {
            $data['application'] = $query;
        } else {
            $data['application'] = array();
        }
        $query = $this->Md->get('studentID', $studentID, 'course');

        if ($query) {
            $data['course'] = $query;
        } else {
            $data['course'] = array();
        }
        $query = $this->Md->get('studentID', $studentID, 'remittance');

        if ($query) {
            $data['remit'] = $query;
        } else {
            $data['remit'] = array();
        }

        $this->load->view('student-remit', $data);
    }

    public function view_remit() {

        $this->load->helper(array('form', 'url'));
        $studentID = $this->uri->segment(3);


        $query = $this->Md->get('id', $studentID, 'studentinfo');

        if ($query) {
            $data['profile'] = $query;
        } else {
            $data['profile'] = array();
        }

        $query = $this->Md->get('studentID', $studentID, 'application');

        if ($query) {
            $data['application'] = $query;
        } else {
            $data['application'] = array();
        }
        $query = $this->Md->get('studentID', $studentID, 'course');

        if ($query) {
            $data['course'] = $query;
        } else {
            $data['course'] = array();
        }
        $query = $this->Md->get('studentID', $studentID, 'remittance');

        if ($query) {
            $data['remit'] = $query;
        } else {
            $data['remit'] = array();
        }

        $this->load->view('view-remit', $data);
    }

    public function view_payment() {

        $this->load->helper(array('form', 'url'));
        $studentID = $this->uri->segment(3);


        $query = $this->Md->get('id', $studentID, 'studentinfo');

        if ($query) {
            $data['profile'] = $query;
        } else {
            $data['profile'] = array();
        }

        $query = $this->Md->get('studentID', $studentID, 'application');

        if ($query) {
            $data['application'] = $query;
        } else {
            $data['application'] = array();
        }
        $query = $this->Md->get('studentID', $studentID, 'course');

        if ($query) {
            $data['course'] = $query;
        } else {
            $data['course'] = array();
        }
        $query = $this->Md->get('studentID', $studentID, 'refund');

        if ($query) {
            $data['refund'] = $query;
        } else {
            $data['refund'] = array();
        }

        $this->load->view('view-payment', $data);
    }

    public function refund() {

        $this->load->helper(array('form', 'url'));
        $studentID = $this->session->userdata('id');


        $query = $this->Md->get('id', $studentID, 'studentinfo');

        if ($query) {
            $data['profile'] = $query;
        } else {
            $data['profile'] = array();
        }

        $query = $this->Md->get('studentID', $studentID, 'application');

        if ($query) {
            $data['application'] = $query;
        } else {
            $data['application'] = array();
        }
        $query = $this->Md->get('studentID', $studentID, 'course');

        if ($query) {
            $data['course'] = $query;
        } else {
            $data['course'] = array();
        }
        $query = $this->Md->get('studentID', $studentID, 'refund');

        if ($query) {
            $data['refund'] = $query;
        } else {
            $data['refund'] = array();
        }

        $this->load->view('view-refund', $data);
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
        $title = $this->input->post('title');
        $description = $this->input->post('description');

        // function update($id, $data,$table)
        $profile = array('title' => $title, 'description' => $description);
        $this->MD->update($id, $profile, 'profile');
        $this->session->set_flashdata('msg', '<div class="alert alert-info"> <strong>
                                                  Information updated	</strong>									
						</div>');

        redirect('/profile/edit/' . $id, 'refresh');
        return;
    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(3);

        $this->MD->remove_table($id, 'profile', 'image');
        //delete($id,$table);
        //remove($id,$table,$column)

        $query = $this->MD->delete($id, 'profile');

        if ($this->db->affected_rows() > 0) {
            $msg = '<span style="color:red">Information Deleted </span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('/profile', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
            $this->session->set_flashdata('msg', $msg);
            redirect('/profile', 'refresh');
        }
    }

    public function images() {
        $id = $this->uri->segment(3);
        $query = $this->Md->remove($id);
        $query = $this->Md->delete($id, 'image');

        if ($this->db->affected_rows() > 0) {
            $msg = '<span style="color:red">Information Deleted </span>';
            $this->session->set_flashdata('action', $msg);
            redirect('/project', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
            $this->session->set_flashdata('action', $msg);
            redirect('/project', 'refresh');
        }
    }

}
