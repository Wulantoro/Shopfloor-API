<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class DocentriSap extends REST_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_docentrysap');
	}

	public function index_get() {
		$workCenter = $this->get('workCenter');
		$mobileId = $this->get('mobileId');
		$data = $this->M_docentrysap->read($workCenter, $mobileId);
		if ($data) {
			# code...
			$this->response([
				'status' => TRUE,
				'message' => 'Docentrysap were found',
				'data' => $data
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data not fouind',
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}