<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class Totreject extends Rest_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_totreject');
	}

	public function index_get() {
		$hostHeadEntry = $this->get('hostHeadEntry');
		$data = $this->M_totreject->read($hostHeadEntry);

		if ($data) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'tot ketemu',
				'data' => $data
			], Rest_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data not found']);
		}
	}
}