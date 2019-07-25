<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class LastReject extends REST_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_lastreject');
	}

	public function index_get() {
		$docEntry = $this->get('docEntry');
		$data = $this->M_lastreject->read($docEntry);

		if ($data) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'Item reject where found',
				'data' => $data
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data not found',
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}