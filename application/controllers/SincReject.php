<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class SincReject extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_sincreject');
	}

	public function index_get() {
		$DocEntry = $this->get('DocEntry');
		$data = $this->M_sincreject->read($DocEntry);

		if ($data) {
			$this->response([
				'status' => TRUE,
				'message' => 'SincReject ketemu',
				'data' => $data
			], REST_Controller::HTTP_OK);
		}else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data not found',
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_post() {
	// 	$data = json_decode(file_get_contents('php://input'), TRUE);

	// 	$cek = $this->M_sincreject->save_batch($data);

	// 	if ($cek) {
	// 		$this->response([
	// 			'status' => TRUE,
	// 			'message' => 'Sync Reject berhasil',
	// 			'data' => $data
	// 		], REST_Controller::HTTP_OK);
	// 	} else {
	// 		$this->response([
	// 			'status' => FALSE,
	// 			'message' => 'Sync Reject gagal ditambah',
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	}
}