<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class LoginUser extends Rest_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_loginuser');
	}

	public function index_get() {
		$user = $this->get('U_STEM_Username');

        $data = $this->M_loginuser->read($user);
        if ($data) {
            # code...
            $this->response([
                'status' => TRUE,
                'message' => 'User ketemu',
                'success' => '1',
                'data' => $data
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'status' => FALSE,
                'success' => '0',
                'message' => 'username tidak ada'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
	}
	public function index_post($U_STEM_Username = 'U_STEM_Username', $U_STEM_Password='U_STEM_Password') {
		$U_STEM_Username = $this->post('U_STEM_Username');
		$U_STEM_Password = $this->post('U_STEM_Password');

		// $data = $this->M_loginuser->read($U_STEM_Username, $U_STEM_Password);

		if(!empty($U_STEM_Username) && !empty($U_STEM_Password)) {
			$con['conditions'] = array(
				'U_STEM_Username' => $U_STEM_Username,
				'U_STEM_Password' => $U_STEM_Password);
			$data = $this->M_loginuser->LoginApi($U_STEM_Username, $U_STEM_Password);

		if($data) {
			$this->response([
				'status' => TRUE,
				'message' => 'Login berhasi buoooossss',
                 'success' => '1',
				'data' => $data
			], REST_Controller::HTTP_OK);
		} else{
			$this->response([
				'status' => FALSE,
                 'success' => '0',
				'message' => 'username atau password salah'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

/**************************************************************************************************************/

	/*public function login() {
		$U_STEM_Username = $this->post('U_STEM_Username');
		$U_STEM_Password = $this->post('U_STEM_Password');

		//validate the data post
		if(!empty($username) && !empty($password)) {

			$con['conditions'] = array(
				'U_STEM_Username' => $U_STEM_Username,
				'U_STEM_Password' => $U_STEM_Password);

			$user = $this->M_loginuser->getRows($con);

			if ($user) {
				# code...
				$this->response([
					'status' => TRUE,
					'message' => 'User Login succesfull',
					'data' => $user
				], REST_Controller::HTTP_OK);
			}else{
				$this->response("wrong email or password", REST_Controller::HTTP_BAD_REQUEST);
}			
	}	
}	

/****************************************************************/

/*public function __construct()
    {
        parent::__construct();
        $this->load->model('M_loginuser');
    }


    public function index_get()
    {
        $U_STEM_Username = $this->input->post('U_STEM_Username');
        $U_STEM_Password = $this->input->post('U_STEM_Password');
        $result = $this->M_loginuser->LoginApi($U_STEM_Username, $U_STEM_Password);
        
    }*/

 /*public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('M_loginuser');
    }
    
    public function index_get() {
        // Get the post data
        $U_STEM_Username = $this->post('U_STEM_Username');
        $U_STEM_Password = $this->post('U_STEM_Password');
        
        // Validate the post data
        if(!empty($U_STEM_Username) && !empty($U_STEM_Password)){
            
            // Check if any user exists with the given credentials
           
            $con['conditions'] = array(
                'U_STEM_Username' => $U_STEM_Username,
                'U_STEM_Password' => $U_STEM_Password,
                'status' => 1
            );
            $user = $this->user->getRows($con);
            
            if($user){
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
                $this->response("Wrong email or password.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }*/

    /********************************************************************/

    /*public function __construct() {
    	parent::__construct();
    	$this->load->model('M_loginuser');
    }

     public function index_get() {
    	 echo 'beasiswa api';
     }

    public function index_post() {
    	 $U_STEM_Username = $this->input->post('U_STEM_Username');
        $U_STEM_Password = $this->input->post('U_STEM_Password');
        $result = $this->M_loginuser->LoginApi($U_STEM_Username, $U_STEM_Password);

          // return $result;
          echo json_encode($result);
    }*/
    
}
}
