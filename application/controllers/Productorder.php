<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class Productorder extends Rest_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_productorder');
	}

	public function index_get() {
		 $Code = $this->get('wccode');
	
			$data = $this->M_productorder->read($Code);
			if ($data) {
				
			$this->response([
				'status' => TRUE,
				'message' => 'Production Order were found',
				'data' => $data
			], REST_Controller::HTTP_OK);
	}else{
		$this->response([
			'status' => False,
			'message' => 'Data not found',
		], REST_Controller::HTTP_NOT_FOUND);
	}
	}
}