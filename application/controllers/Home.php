<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
      //  $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
        $data['users'] = array();
        $data['services'] = array();
        $data['jobs'] = array();
        $data['banners'] = array();
        $data['news']= array();
        $data['equipments']= array();
        
        $query = $this->Md->query("SELECT * FROM user");        
        if ($query) { $data['users'] = $query;     }
        $query = $this->Md->query("SELECT * FROM service");
        if ($query) { $data['services'] = $query;  } 
        $query = $this->Md->query("SELECT user.lname,user.fname,memberjob.title,user.image,user.country FROM user LEFT OUTER JOIN memberjob ON user.id = memberjob.userID WHERE memberjob.userID IS NOT NULL");
        // var_dump($query);
        if ($query) { $data['jobs'] = $query;  }
        $query = $this->Md->query("SELECT * FROM banner");        
        if ($query) { $data['banners'] = $query; }
        $query = $this->Md->query("SELECT * FROM news");        
        if ($query) { $data['news'] = $query; }
 // var_dump($query);
          $query = $this->Md->query("SELECT *, user.lname,user.fname,equipment.image AS picture,user.image,user.country FROM user LEFT OUTER JOIN equipment ON user.id = equipment.userID WHERE equipment.userID IS NOT NULL LIMIT 1");
        // var_dump($query);
        if ($query) { $data['equipments'] = $query;  }
        $this->load->view('pages/home',$data);
    }
     public function register() {
            $query = $this->Md->query("SELECT * FROM banner");        
        if ($query) { $data['banners'] = $query; }
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
            $query = $this->Md->query("SELECT * FROM banner");        
        if ($query) { $data['banners'] = $query; }
         $data['users'] = array();
        $data['services'] = array();
        $data['jobs'] = array();
        $data['memberservices'] = array();
        $data['banners'] = array();
        $data['news']= array();
        
        $query = $this->Md->query("SELECT * FROM user");        
        if ($query) { $data['users'] = $query;     }
        $query = $this->Md->query("SELECT * FROM service");
        if ($query) { $data['services'] = $query;  } 
         $query = $this->Md->query("SELECT * FROM memberservice");
        if ($query) { $data['memberservices'] = $query;  } 
        $query = $this->Md->query("SELECT *,user.lname,user.fname,memberjob.title,user.image,user.country FROM user LEFT OUTER JOIN memberjob ON user.id = memberjob.userID WHERE memberjob.userID IS NOT NULL ORDER BY memberjob.id DESC");
        // var_dump($query);
        if ($query) { $data['jobs'] = $query;  }
        $query = $this->Md->query("SELECT * FROM banner ORDER BY id DESC");        
        if ($query) { $data['banners'] = $query; }
        $query = $this->Md->query("SELECT * FROM news");        
        if ($query) { $data['news'] = $query; }

		$this->load->view('pages/jobs',$data);

	}
        public function services()
	{ 
                $query = $this->Md->query("SELECT * FROM banner");        
        if ($query) { $data['banners'] = $query; }
        $data['users'] = array();
        $data['services'] = array();
        $data['jobs'] = array();
        $data['memberservices'] = array();
        $data['banners'] = array();
        $data['news']= array();
        
        $query = $this->Md->query("SELECT * FROM user");        
        if ($query) { $data['users'] = $query;     }
        $query = $this->Md->query("SELECT * FROM service");
        if ($query) { $data['services'] = $query;  } 
         $query = $this->Md->query("SELECT * FROM memberservice");
        if ($query) { $data['memberservices'] = $query;  } 
        $query = $this->Md->query("SELECT user.lname,user.fname,memberjob.title,user.image,user.country FROM user LEFT OUTER JOIN memberjob ON user.id = memberjob.userID WHERE memberjob.userID IS NOT NULL LIMIT 5");
        // var_dump($query);
        if ($query) { $data['jobs'] = $query;  }
        $query = $this->Md->query("SELECT * FROM banner");        
        if ($query) { $data['banners'] = $query; }
        $query = $this->Md->query("SELECT * FROM news");        
        if ($query) { $data['news'] = $query; }
         
            $this->load->view('pages/services',$data);

	}
      public function thisservice()
	{ 
          
        $this->load->helper(array('form', 'url'));
        $details = urldecode( $this->uri->segment(3));  
        
        $data['users'] = array();
        $data['services'] = array();
        $data['jobs'] = array();
        $data['memberservices'] = array();
        $data['banners'] = array();
        $data['news']= array();
        
        $query = $this->Md->query("SELECT * FROM user");        
        if ($query) { $data['users'] = $query;     }
        $query = $this->Md->query("SELECT * FROM service");
        if ($query) { $data['services'] = $query;  }         
         $query = $this->Md->query("SELECT *,user.lname,user.fname,user.image AS image,user.country ,memberservice.id AS id FROM user LEFT OUTER JOIN memberservice ON user.id = memberservice.userID WHERE memberservice.service='".$details."'");
        // var_dump($query);
        if ($query) { $data['memberservices'] = $query;  }
        if ($query) { $data['jobs'] = $query;  }
        $query = $this->Md->query("SELECT * FROM banner");        
        if ($query) { $data['banners'] = $query; }
        $query = $this->Md->query("SELECT * FROM news");        
        if ($query) { $data['news'] = $query; }
        $data['service']=$details;
            $query = $this->Md->query("SELECT * FROM banner ORDER BY id DESC");        
        if ($query) { $data['banners'] = $query; }
         
            $this->load->view('pages/service',$data);

	}
        public function equipment()
	{
        $data['users'] = array();
        $data['services'] = array();
        $data['equipments'] = array();
        $data['memberservices'] = array();
        $data['banners'] = array();
        $data['news']= array();
        
        $query = $this->Md->query("SELECT * FROM user");        
        if ($query) { $data['users'] = $query;     }
        $query = $this->Md->query("SELECT * FROM service");
        if ($query) { $data['services'] = $query;  } 
         $query = $this->Md->query("SELECT * FROM memberservice");
        if ($query) { $data['memberservices'] = $query;  } 
        $query = $this->Md->query("SELECT *, user.lname,user.fname,equipment.image AS picture,user.image,user.country FROM user LEFT OUTER JOIN equipment ON user.id = equipment.userID WHERE equipment.userID IS NOT NULL ORDER BY equipment.id DESC ");
        // var_dump($query);
        if ($query) { $data['equipments'] = $query;  }
        $query = $this->Md->query("SELECT * FROM banner");        
        if ($query) { $data['banners'] = $query; }
        $query = $this->Md->query("SELECT * FROM news");        
        if ($query) { $data['news'] = $query; }
		
		$this->load->view('pages/equipment',$data);

	}
        public function about()
	{
                $query = $this->Md->query("SELECT * FROM banner");        
        if ($query) { $data['banners'] = $query; }
             $data['abouts'] = array();
             $query = $this->Md->query("SELECT * FROM about");        
        if ($query) { $data['abouts'] = $query; }
		$this->load->view('pages/about',$data);

	}
        public function contact()
	{
          
        $data['users'] = array();
        $data['services'] = array();
        $data['equipments'] = array();
        $data['memberservices'] = array();
        $data['banners'] = array();
        $data['contacts']= array();
        
        $query = $this->Md->query("SELECT * FROM user");        
        if ($query) { $data['users'] = $query;     }
        $query = $this->Md->query("SELECT * FROM service");
        if ($query) { $data['services'] = $query;  } 
         $query = $this->Md->query("SELECT * FROM memberservice");
        if ($query) { $data['memberservices'] = $query;  } 
        $query = $this->Md->query("SELECT *, user.lname,user.fname,equipment.image AS picture,user.image,user.country FROM user LEFT OUTER JOIN equipment ON user.id = equipment.userID WHERE equipment.userID IS NOT NULL");
        // var_dump($query);
        if ($query) { $data['equipments'] = $query;  }
        $query = $this->Md->query("SELECT * FROM banner");        
        if ($query) { $data['banners'] = $query; }
        $query = $this->Md->query("SELECT * FROM contact");        
        if ($query) { $data['contacts'] = $query; }
             $query = $this->Md->query("SELECT * FROM banner");        
        if ($query) { $data['banners'] = $query; } 
		$this->load->view('pages/contact',$data);
	}
         public function login()
	{
                  $query = $this->Md->query("SELECT * FROM banner");        
        if ($query) { $data['banners'] = $query; } 
		$this->load->view('pages/login',$data);

	}

  

  
  
  
}
