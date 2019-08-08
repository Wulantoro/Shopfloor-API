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

	public function index_put() {

		$data = [
			'docEntry' =>$this->put('docEntry'),
			 'lineNumber' => $this->put('lineNumber'),
			'rejectCode' => $this->put('rejectCode'),
			'rejectName' => $this->put('rejectName'),
			'rejectQty' => $this->put('rejectQty')
		];
		$id = $this->put('id');
		
		$cek = $this->M_inputreject->putReject($data, $id);

		if ($cek > 0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Reject berhasil diedit',
				'data' => $data
			], Rest_Controller::HTTP_OK);
		}else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data gagal diedit',
			], REST_Controller::HTTP_NOT_FOUND);
		}

	}

	/*public function index_delete() {
		$id = $this->delete('id');
		$cek = $this->M_inputreject->deleteReject($id);

		if ($cek > 0) {
			$this->response([
				'status' => True,
				'message' => 'Reject berhasil dihapus',
			], REST_Controller::HTTP_OK);
		}else {
			$this->response([
				'status' => false,
				'message' => 'Reject gagal dihapus'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}*/

	public function index_delete()
	{
	$id=$this->input->get('id');
	$cek = $this->M_inputreject->deleterecords($id);

	if ($cek > 0) {
		$this->response([
				'status' => false,
				'message' => 'Reject gagal dihapus'
			], REST_Controller::HTTP_NOT_FOUND);
			
		}else {
			
			$this->response([
				'status' => True,
				'message' => 'Reject berhasil dihapus',
			], REST_Controller::HTTP_OK);
		}

	}
}





