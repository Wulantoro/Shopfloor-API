<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

/**
 * 
 */
class Sequence extends REST_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('M_sequence');
	}

	public function index_get($wccode = 'wccode', $docnum = 'docnum') {
		$wccode = $this->get('wccode');
		 $docnum = $this->get('docnum');
		$data = $this->M_sequence->read($wccode, $docnum);
		if ($data) {
			
			$this->response([
				'status' => TRUE,
				'message' => 'Sequence were found',
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