<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class CriteriaSucc extends REST_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_criteriasucc');
	}

	public function index_get($hostHeadEntry = 'hostHeadEntry') {
		$hostHeadEntry = $this->get('hostHeadEntry');

		$data = $this->M_criteriasucc->read($hostHeadEntry);

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
	}


