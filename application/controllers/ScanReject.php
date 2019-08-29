<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class ScanReject extends REST_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_scanreject');
	}

	public function index_get($code = 'code') {
		$code = $this->get('code');

		$data = $this->M_scanreject->read($code);
		if ($data) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'ScanReject were found',
				'data' => $data,
			], REST_Controller::HTTP_OK);

		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data not found',
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}