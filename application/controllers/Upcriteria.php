<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class Upcriteria extends REST_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_upcriteria');
	}

	public function index_get($docEntry = 'docEntry') {
		$docEntry = $this->get('docEntry');

		$data = $this->M_upcriteria->read($docEntry);

		if ($data) {
			
			$this->response([
				'status' => TRUE,
				'message' => 'Criteria were found',
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'data not found',
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}


	public function index_post() {
		$data = [
			'docEntry' =>$this->post('docEntry'),
			// 'lineNumber' =>$this->post('lineNumber'),
			'criteria' =>$this->post('criteria'),
			// 'criteriaDesc'=>$this->post('criteriaDesc'),
			'valueType' =>$this->post('valueType'),
			'standard' =>$this->post('standard'),
			'actualResult'=>$this->post('actualResult'),
			// 'actualRemarks'=>$this->post('actualRemarks')
		];

		$cek = $this->M_upcriteria->upCriteria($data);
		if ($cek) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'Criteria berhasil di tambah',
				'data' => $data
			], REST_Controller::HTTP_OK);
		}else {
			$this->response([
				'status' => FALSE,
				'message' => 'Criteria failed to add',
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}

