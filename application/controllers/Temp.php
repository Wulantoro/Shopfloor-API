<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class Temp extends Rest_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_temp');
	}

	public function index_post() {
		$data = [
			// 'id_user' => $this->post('id_user'),
			'nama_user' => $this->post('nama_user'),
			'email_user' => $this->post('email_user'),
			'pass_user' => $this->post('pass_user')
		];
		$cek = $this->M_temp->addTemp($data);
		if ($cek) {
			# code...
			$this->response([
			'status' => TRUE,
			'message' => 'Data berhasil disimpan',
			'data' => $data
		], Rest_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data failed to add',
			], REST_Controller::HTTP_NOT_FOUND);
		}

	}
}