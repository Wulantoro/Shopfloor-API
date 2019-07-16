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

	public function index_get($wccode = 'wccode', $docNum = 'docNum', $U_Sequence = 'U_Sequence') {
	// public function index_get($wccode = 'wccode', $docNum = 'docNum') {
		// public function index_get($wccode = 'wccode') {
	// public function index_get($docNum = 'docNum') {
	// public function index_get($docNum = 'docNum', $wccode = 'wccode') {
		$wccode = $this->get('wccode');
		$docNum = $this->get('docNum');
		$U_Sequence = $this->get('U_Sequence');
		// $wccode = $this->get('wccode');
		$data = $this->M_criteria->read($wccode, $docNum, $U_Sequence);
		// $data = $this->M_criteria->read($wccode, $docNum);
		// $data = $this->M_criteria->read($wccode);
		// $data = $this->M_criteria->read($docNum);

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
			'criteriaDesc'=>$this->post('criteriaDesc'),
			'valueType' =>$this->post('valueType'),
			'standard' =>$this->post('standard'),
			// 'actualResult'=>$this->post('actualResult'),
			// 'actualRemarks'=>$this->post('actualRemarks')
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