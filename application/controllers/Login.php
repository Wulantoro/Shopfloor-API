<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class Login extends REST_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('M_login');
	}

	public function login() {
		$U_STEM_Username = $this->post('U_STEM_Username');
		$U_STEM_Pasword = $this->post('U_STEM_Pasword');

		//validate post data
		if (!empty($U_STEM_Username) && !empty($U_STEM_Pasword)) {
			# code...
			$con['returnType'] = 'single';
			$con['conditions'] = array(
				'U_STEM_Username' => $U_STEM_Username,
				'U_STEM_Pasword' => $U_STEM_Username,
				'status' => 1
				 );
			$user = $this->user->getRows($con);

			if ($user) {
				# code...
				$this->response([
					'status' => TRUE,
					'message' => 'User login successful.',
					'data' => $user
				], REST_Controller::HTTP_OK);
			}else{
				$this->response("Wrong email or password.", REST_Controller::HTTP_BAD_REQUEST);
			}
		}else{
			$this->response("Provide email and password.", REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}