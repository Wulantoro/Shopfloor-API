<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class LastDocnum extends Rest_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_lastdocnum');
	}

	public function index_get() {
		$docEntry = $this->get('docEntry');
		$data = $this->M_lastdocnum->read($docEntry);

		if ($data) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'data ketemu',
				'data' => $data
			], Rest_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data not found',
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}