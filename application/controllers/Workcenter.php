<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class Workcenter extends Rest_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_workcenter');
	}

	public function index_get() {
		$data = $this->M_workcenter->read();
		
		$this->response([
			'status' => TRUE,
			'message' => 'Workcenter were found',
			'data' => $data]);
}
}