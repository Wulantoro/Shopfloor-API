<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class Reject extends Rest_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_reject');
	}

	public function index_get() {
		$Code = $this->get('Code');
		$data = $this->M_reject->read($Code);
		if ($data) {
			$this->response([
				'status' => TRUE,
				'message' => 'Reject were found',
				'data' => $data
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => False,
				'message' => 'Data not found']);
		}
	}
}