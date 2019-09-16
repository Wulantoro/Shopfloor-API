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

	public function index_get($hostHeadEntry = 'hostHeadEntry') {
		$hostHeadEntry = $this->get('hostHeadEntry');

		$data = $this->M_upcriteria->read($hostHeadEntry);

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


	/*public function index_post() {
		$data = json_decode(file_get_contents('php://input'), TRUE);
		// $data = [
			// 'docEntry' =>$this->post('docEntry'),
			// 'lineNumber' =>$this->post('lineNumber'),
			// 'criteria' =>$this->post('criteria'),
			// 'criteriaDesc'=>$this->post('criteriaDesc'),
			// 'valueType' =>$this->post('valueType'),
			// 'standard' =>$this->post('standard'),
			// 'actualResult'=>$this->post('actualResult'),
			// 'actualRemarks'=>$this->post('actualRemarks')
		// ];

		// $cek = $this->M_upcriteria->upCriteria($data);
		$cek = $this->db->insert_batch('IPP_MOBILE_SHOPFLOORDETAIL1',$data);

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
	}*/

	/*public function index_post() {
		$this->load->model('M_upcriteria');
		$result = $this->M_upcriteria->batchInsert($_POST);
		if ($result) {
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

		}*/

		public function index_post() {
			$data = json_decode(file_get_contents('php://input'), TRUE);

		

			$cek = $this->M_upcriteria->save_batch($data);

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


