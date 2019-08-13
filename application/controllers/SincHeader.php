<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class SincHeader extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_sincheader');
	}

	public function index_get() {
		$docEntry = $this->get('DocEntry');
		$data = $this->M_sincheader->read($docEntry);

		if ($data) {
			$this->response([
				'status' => TRUE,
				'message' => 'SincHeader where found',
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
		 'DocEntry' => $this->post('DocEntry'),
		 'DocNum' => $this->post('DocNum'),
		 'LogInst' => $this->post('LogInst'),
		 'CreateDate' => $this->post('CreateDate'),
		 'U_DocDate' => $this->post('U_DocDate'),
		 'U_PD_No' => $this->post('U_PD_No'),
		 'U_Sequence' => $this->post('U_Sequence'),
		 'U_Product' => $this->post('U_Product'),
		 'U_ProductDesc' => $this->post('U_ProductDesc'),
		 'U_PlannedQty' => $this->post('U_PlannedQty'),
		 'U_SequenceQty' => $this->post('U_SequenceQty'),
		 'U_WCCode' => $this->post('U_WCCode'),
		 'U_WCDesc' => $this->post('U_WCDesc'),
		 'U_InputQty' => $this->post('U_InputQty'),
		 'U_OutputQty' => $this->post('U_OutputQty'),
		 'U_PD_Status' => $this->post('U_PD_Status'),
		 'U_RouteCode' => $this->post('U_RouteCode'),
		 'U_RouteDesc' => $this->post('U_RouteDesc'),
		 'U_Shift' => $this->post('U_Shift'),
		 'U_ShiftDesc' => $this->post('U_ShiftDesc'),
		 'U_TglMulai' => $this->post('U_TglMulai'),
		 'U_TglSelesai' => $this->post('U_TglSelesai'),
		 'U_JamMulai' => $this->post('U_JamMulai'),
		 'U_JamSelesai' => $this->post('U_JamSelesai'),
		 'U_Operator' => $this->post('U_Operator')
		];

		$cek = $this->M_sincheader->addSincHeader($data);
		if ($cek) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data berhasil diSynchron',
				'data' => $data
			], REST_Controller::HTTP_OK);
		}else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data fauled to synchron',
			], REST_Controller::HTTP_NOT_FOUND);
		}

	}
}