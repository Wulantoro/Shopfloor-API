<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class SincCriteria extends Rest_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_sinccriteria');
	}

	public function index_get() {
		$hostHeadEntry = $this->get('hostHeadEntry');
		$data = $this->M_sinccriteria->read($hostHeadEntry);

		if ($data) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'Sinc Criteria kertemu',
				'data' => $data
			], Rest_Controller::HTTP_OK);
		}else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data not found',
			], REST_Controller::HTTP_NOT_FOUND);
		}

	}

	public function index_post() {
		$data = json_decode(file_get_contents('php://input'), TRUE);

		$cek = $this->M_sinccriteria->save_batch($data);

		if ($cek) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'Sync Criteria berhasil',
				'data' => $data
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Sync Criteria gagal',
			], REST_Controller::HTTP_NOT_FOUND);
		}

	}
}