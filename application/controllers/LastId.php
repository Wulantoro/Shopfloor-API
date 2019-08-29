<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class LastId extends REST_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_lastid');
	}

	public function index_get($mobileId = 'mobileId', $docEntry = 'docEntry') {
		
		$mobileId = $this->get('mobileId');
		$docEntry = $this->get('docEntry');
		$data = $this->M_lastid->read($mobileId, $docEntry);

		if ($data) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'id ketemu',
				'data' => $data
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' =>FALSE,
				'message' => 'Data not found',
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}