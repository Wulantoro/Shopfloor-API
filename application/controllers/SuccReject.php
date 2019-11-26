<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;


class SuccReject extends REST_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_succreject');
	}

	public function index_get($hostHeadEntry = 'hostHeadEntry') {
		$hostHeadEntry = $this->get('hostHeadEntry');
		$data = $this->M_succreject->read($hostHeadEntry);
		if ($data) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'Item reject were found',
				'data' => $data
			], REST_Controller::HTTP_OK);
		}else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data not found',
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	
}





