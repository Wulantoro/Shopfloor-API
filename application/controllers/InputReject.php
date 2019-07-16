<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;


class InputReject extends REST_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_inputreject');
	}

	public function index_get() {
		$docEntry = $this->get('docEntry');
		$data = $this->M_inputreject->read($docEntry);
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

	public function index_post() {
		$data = [
			'docEntry' =>$this->post('docEntry'),
			 'lineNumber' => $this->post('lineNumber'),
			'rejectCode' => $this->post('rejectCode'),
			'rejectName' => $this->post('rejectName'),
			'rejectQty' => $this->post('rejectQty')
		];
		$cek = $this->M_inputreject->addReject($data);
		if ($cek) {
			# code...
			$this->response([
				'status' =>TRUE,
				'message' => 'Data berhasil disimpan',
				'data' => $data
			], REST_Controller::HTTP_OK);
		}else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data failed to add',
			], Rest_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_delete($docEntry = 'docEntry') {
		$docEntry = $this->delete('docEntry');
		$cek = $this->M_inputreject->deleteReject($docEntry);
		if ($cek > 0) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'Data success for delete',
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data failed to delete',
			], Rest_Controller::HTTP_NOT_FOUND);
		}
	}
}


