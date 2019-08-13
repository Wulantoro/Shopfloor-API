<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class Namawc extends REST_Controller{

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_namawc');
	}

	public function index_get($code = 'code') {
		$code = $this->get('code');

		$data = $this->M_namawc->read($code);

		if ($data) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'namawc ketemu',
				'data' => $data,
			], REST_Controller::HTTP_OK);
		}else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data not found',
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}