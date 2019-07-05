<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class CompleteHeader extends Rest_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_completeheader');
	}

	public function index_get() {
		$workCenter = $this->get('workCenter');
		$data = $this->M_completeheader->read($workCenter);
		if ($data) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'Header complete where found',
				'data' => $data
			], Rest_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data not found']);
		}
	}
}