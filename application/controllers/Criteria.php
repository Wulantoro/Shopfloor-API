<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class Criteria extends REST_Controller{

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_criteria');
	}

	public function index_get($wccode = 'wccode', $docnum = 'docnum') {
		$wccode = $this->get('wccode');
		$docnum = $this->get('docnum');
		$data = $this->M_criteria->read($wccode, $docnum);

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
			'lineNumber' =>$this->post('lineNumber'),
			'criteria' =>$this->post('criteria'),
			'criteriaDesc'=>$this->post('criteriaDesc'),
			'valueType' =>$this->post('valueType'),
			'standard' =>$this->post('standard'),
			'actualResult'=>$this->post('actualResult'),
			'actualRemarks'=>$this->post('actualRemarks')
		];

		$cek = $this->M_criteria->addCriteria($data);
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