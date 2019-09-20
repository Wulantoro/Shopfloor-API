<?php
defined('BASEPATH') OR exit ('NO direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\Rest_Controller;

class UploadSap extends Rest_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('M_uploadsap');
		}

		public function index_get() {
			//$docEntry = $this->get('docEntry');
      $workCenter = $this->get('workCenter');
			$data = $this->M_uploadsap->read( $workCenter);
			if ($data) {
				# code...
				$this->response([
					'status' => TRUE,
					'message' => 'Header where Found',
					'data' => $data
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => FALSE,
					'message' => 'Data not found',
				], REST_Controller::HTTP_NOT_FOUND);
			}

		}

		public function index_post() {
			$data = [
				  // 'docEntry' => $this->post('docEntry'),
				    'id' => $this->post('id'),
            'mobileId' => $this->post('mobileId'),
           'docNum' => $this->post('docNum'),
           'docDate' => $this->post('docDate'),
           'prodNo' => $this->post('prodNo'),
           'prodCode' => $this->post('prodCode'),
           'prodName' => $this->post('prodName'),
           'prodPlanQty' => $this->post('prodPlanQty'),
           'prodStatus' => $this->post('prodStatus'),
           'routeCode' => $this->post('routeCode'),
           'routeName' => $this->post('routeName'),
           'sequence' => $this->post('sequence'),
           'sequenceQty' => $this->post('sequenceQty'),
           'shift' => $this->post('shift'),
           'shiftName' => $this->post('shiftName'),
           'tanggalMulai' => $this->post('tanggalMulai'),
           'tanggalSelesai' => $this->post('tanggalSelesai'),
           'jamMulai' => $this->post('jamMulai'),
           'jamSelesai' => $this->post('jamSelesai'),
           'inQty' => $this->post('inQty'),
           'outQty' => $this->post('outQty'),
           'remarks' => $this->post('remarks'),
           'userId'  => $this->post('userId'),
           // 'QcName'  => $this->post('QcName'),
           'posted'  => $this->post('posted'),
           'TargetEntry'  => $this->post('TargetEntry'),
           'UploadTime'  => $this->post('UploadTime'),
           'workCenter'  => $this->post('workCenter'),
           'status'  => $this->post('status')
       ];
       $cek = $this->M_uploadsap->addHeader($data);
       if ($cek) {
       	$this->response([
       		'status' => TRUE,
       		'message' => 'Data berhasil disimpan',
       		'data' => $data
       	], REST_Controller::HTTP_OK);
       } else{
       	$this->response([
       		'status' => FALSE,
       		'message' => 'Data failed to add',
       	], REST_Controller::HTTP_NOT_FOUND);
       }
		}

    public function index_put() {
      $data = [
          
          'id' => $this->put('id'),
            'mobileId' => $this->put('mobileId'),
           'docNum' => $this->put('docNum'),
           'docDate' => $this->put('docDate'),
           'prodNo' => $this->put('prodNo'),
           'prodCode' => $this->put('prodCode'),
           'prodName' => $this->put('prodName'),
           'prodPlanQty' => $this->put('prodPlanQty'),
           'prodStatus' => $this->put('prodStatus'),
           'routeCode' => $this->put('routeCode'),
           'routeName' => $this->put('routeName'),
           'sequence' => $this->put('sequence'),
           'sequenceQty' => $this->put('sequenceQty'),
           'shift' => $this->put('shift'),
           'shiftName' => $this->put('shiftName'),
           'tanggalMulai' => $this->put('tanggalMulai'),
           'tanggalSelesai' => $this->put('tanggalSelesai'),
           'jamMulai' => $this->put('jamMulai'),
           'jamSelesai' => $this->put('jamSelesai'),
           'inQty' => $this->put('inQty'),
           'outQty' => $this->put('outQty'),
           'remarks' => $this->put('remarks'),
           'userId'  => $this->put('userId'),
           // 'QcName'  => $this->put('QcName'),
           'posted'  => $this->put('posted'),
           'TargetEntry'  => $this->put('TargetEntry'),
           'UploadTime'  => $this->put('UploadTime'),
           'workCenter'  => $this->put('workCenter'),
           'status'  => $this->put('status')
       ];
         $docEntry = $this->put('docEntry');
       $cek = $this->M_simpanheader->putHeader($data, $docEntry);
       if ($cek>0) {
        $this->response([
          'status' => TRUE,
          'message' => 'Data berhasil disimpan',
          'data' => $data
        ], REST_Controller::HTTP_OK);
       } else{
        $this->response([
          'status' => FALSE,
          'message' => 'Data failed to Edit',
        ], REST_Controller::HTTP_NOT_FOUND);
       }
    }
	}
