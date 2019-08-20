<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

/**
 * 
 */
class Poscan extends REST_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('M_poscan');
	}

	// public function index_get($wccode = 'wccode', $DocNum = 'DocNum', $U_Sequence = 'U_Sequence') {
	public function index_get($wccode = 'wccode', $DocNum = 'DocNum', $seq = 'seq') {
		$wccode = $this->get('wccode');
		 $DocNum = $this->get('DocNum');
		 // $U_Sequence = $this->get('U_Sequence');
		 $seq = $this->get('seq');

		// $data = $this->M_poscan->read($wccode, $DocNum, $U_Sequence);
		 $data = $this->M_poscan->read($wccode, $DocNum, $seq);
		if ($data) {
			
			$this->response([
				'status' => TRUE,
				'message' => 'Scan were found',
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data not found',
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}