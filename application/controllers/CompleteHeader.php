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

	/*public function index_delete($docEntry = 'docEntry') {
		$docEntry = $this->delete('docEntry');

		$cek = $this->M_completeheader->deleteReject($docEntry);

		if ($cek) {
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
		
		}*/

		public function index_delete($docEntry = 'docEntry') {
			$r = $this->M_completeheader->delete($docEntry);
			$this->response($r);
		}

	}