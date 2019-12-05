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

  $data = json_decode(file_get_contents('php://input'), true);

      $data1 = [
        'id' => $data['id'],
           'docNum' => $data['docNum'],
           'docDate' =>$data['docDate'],
           'prodNo' => $data['prodNo'],
           'prodCode' => $data['prodCode'],
           'prodName' => $data['prodName'],
           'prodPlanQty' => $data['prodPlanQty'],
           'prodStatus' => $data['prodStatus'],
           'routeCode' => $data['routeCode'],
           'routeName' => $data['routeName'],
           'sequence' => $data['sequence'],
           'sequenceQty' => $data['sequenceQty'],
           'shift' => $data['shift'],
           'shiftName' => $data['shiftName'],
           'tanggalMulai' => $data['tanggalMulai'],
           'tanggalSelesai' => $data['tanggalSelesai'],
           'jamMulai' => $data['jamMulai'],
           'jamSelesai' => $data['jamSelesai'],
           'inQty' => $data['inQty'],
           'outQty' => $data['outQty'],
           'userId'  => $data['userId'],
           // 'remarks' => $data['remarks'],
           'mobileId' => $data['mobileId'],
           'posted'  => $data['posted'],
           'workCenter'  => $data['workCenter'],
           'status'  => $data['status']
          
       ];

      $data2 = array();
      $data2 = $data['detail'];

      $data3 = array();
      $data3 = $data['detail1'];
     

     $dataArr = array($data1, $data2, $data3);

       $cek = $this->M_uploadsap->addHeader($data1, $data2, $data3);
      
       if ($cek!==FALSE) {
        $this->response([
          'status' => TRUE,
          'message' => 'Data berhasil disimpan',
          'data' => $cek
        ], REST_Controller::HTTP_OK);
       } else{
        $this->response([
          'status' => FALSE,
          'message' => 'Data failed to add',
        ], REST_Controller::HTTP_NOT_FOUND);
       }
    }

  

/**************ga ada errore bener banget****************************/
  // public function index_post() {

  // $data = json_decode(file_get_contents('php://input'), true);
  // //$data = json_encode($data);

  // //var_dump($data['detail']);
  // //exit;
  // //exit;

  //     $data1 = [
  //       'id' => $data['id'],
  //          'docNum' => $data['docNum'],
  //          'docDate' =>$data['docDate'],
  //          'prodNo' => $data['prodNo'],
  //          'prodCode' => $data['prodCode'],
  //          'prodName' => $data['prodName'],
  //          'prodPlanQty' => $data['prodPlanQty'],
  //          'prodStatus' => $data['prodStatus'],
  //          'routeCode' => $data['routeCode'],
  //          'routeName' => $data['routeName'],
  //          'sequence' => $data['sequence'],
  //          'sequenceQty' => $data['sequenceQty'],
  //          'shift' => $data['shift'],
  //          'shiftName' => $data['shiftName'],
  //          'tanggalMulai' => $data['tanggalMulai'],
  //          'tanggalSelesai' => $data['tanggalSelesai'],
  //          'jamMulai' => $data['jamMulai'],
  //          'jamSelesai' => $data['jamSelesai'],
  //          'inQty' => $data['inQty'],
  //          'outQty' => $data['outQty'],
  //          'userId'  => $data['userId'],
  //          // 'remarks' => $data['remarks'],
  //          'mobileId' => $data['mobileId'],
  //          'posted'  => $data['posted'],
  //          'workCenter'  => $data['workCenter'],
  //          'status'  => $data['status']
          
  //      ];

  //     $data2 = array();
  //     $data2 = $data['detail'];
  //    //   $data2[] = [
  //    //    'hostHeadEntry' => $this->input->post('hostHeadEntry'),
  //    //    'lineNumber' => $this->input->post('lineNumber'),
  //    //    'rejectCode' => $this->input->post('rejectCode'),
  //    //    'id' => $this->input->post('id'),
  //    //    'rejectName' => $this->input->post('rejectName'),
  //    // ];

  //    $dataArr = array($data1, $data2);

  //      $cek = $this->M_uploadsap->addHeader($data1, $data2);
  //      // $cek = $this->M_uploadsap->addHeader($data1);
  //      if ($cek!==FALSE) {
  //       $this->response([
  //         'status' => TRUE,
  //         'message' => 'Data berhasil disimpan',
  //         'data' => $cek
  //       ], REST_Controller::HTTP_OK);
  //      } else{
  //       $this->response([
  //         'status' => FALSE,
  //         'message' => 'Data failed to add',
  //       ], REST_Controller::HTTP_NOT_FOUND);
  //      }
  //   }

    // public function index_post() {

    //   $data = json_decode(file_get_contents('php://input'), true);

    //   $data1 = [
        // 'id' => $data['id'],
        //     'mobileId' => $data['mobileId'],
        //    'docNum' => $data['docNum'],
        //    'docDate' => $data['docDate'],
        //    'prodNo' => $data['prodNo'],
        //    'prodCode' => $data['prodCode'],
        //    'prodName' => $data['prodName'],
        //    'prodPlanQty' => $data['prodPlanQty'],
        //    'prodStatus' => $data['prodStatus'],
        //    'routeCode' => $data['routeCode'],
        //    'routeName' => $data['routeName'],
        //    'sequence' => $data['sequence'],
        //    'sequenceQty' => $data['sequenceQty'],
        //    'shift' => $data['shift'],
        //    'shiftName' => $data['shiftName'],
        //    'tanggalMulai' => $data['tanggalMulai'],
        //    'tanggalSelesai' => $data['tanggalSelesai'],
        //    'jamMulai' => $data['jamMulai'],
        //    'jamSelesai' => $data['jamSelesai'],
        //    'inQty' => $data['inQty'],
        //    'outQty' => $data['outQty'],
        //    'remarks' => $data['remarks'],
        //    'userId'  => $data['userId'],
        //    // 'QcName'  => $this->post('QcName'),
        //    'posted'  => $data['posted'],
        //    'TargetEntry'  => $data['TargetEntry'],
        //    'UploadTime'  => $data['UploadTime'],
        //    'workCenter'  => $data['workCenter'],
        //    'status'  => $data['status']
    //   ];

    //   $data2 = array();
    //   $data2 = $data['detail'];

    //   $dataArr = array($data1, $data2);

    //   $cek = $this->M_uploadsap->addHeader($data1, $data2);
    //   if ($cek !== false) {
    //     # code...
    //     $this->response([
    //       'status' => true,
    //       'message' => 'Data berhasil disimpan',
    //       'data' => $cek
    //     ], REST_Controller::HTTP_OK);
    //   } else {
    //     $this->response([
    //       'status' => false,
    //       'message' => 'Data failed to add',
    //     ], REST_Controller::HTTP_NOT_FOUND);
    //   }
    // }


/*********************LAMA*****************************/
		// public function index_post() {
		// 	$data = [
		// 		  // 'docEntry' => $this->post('docEntry'),
		// 		    'id' => $this->post('id'),
  //           'mobileId' => $this->post('mobileId'),
  //          'docNum' => $this->post('docNum'),
  //          'docDate' => $this->post('docDate'),
  //          'prodNo' => $this->post('prodNo'),
  //          'prodCode' => $this->post('prodCode'),
  //          'prodName' => $this->post('prodName'),
  //          'prodPlanQty' => $this->post('prodPlanQty'),
  //          'prodStatus' => $this->post('prodStatus'),
  //          'routeCode' => $this->post('routeCode'),
  //          'routeName' => $this->post('routeName'),
  //          'sequence' => $this->post('sequence'),
  //          'sequenceQty' => $this->post('sequenceQty'),
  //          'shift' => $this->post('shift'),
  //          'shiftName' => $this->post('shiftName'),
  //          'tanggalMulai' => $this->post('tanggalMulai'),
  //          'tanggalSelesai' => $this->post('tanggalSelesai'),
  //          'jamMulai' => $this->post('jamMulai'),
  //          'jamSelesai' => $this->post('jamSelesai'),
  //          'inQty' => $this->post('inQty'),
  //          'outQty' => $this->post('outQty'),
  //          'remarks' => $this->post('remarks'),
  //          'userId'  => $this->post('userId'),
  //          // 'QcName'  => $this->post('QcName'),
  //          'posted'  => $this->post('posted'),
  //          'TargetEntry'  => $this->post('TargetEntry'),
  //          'UploadTime'  => $this->post('UploadTime'),
  //          'workCenter'  => $this->post('workCenter'),
  //          'status'  => $this->post('status')
  //      ];
  //      $cek = $this->M_uploadsap->addHeader($data);
  //      if ($cek) {
  //      	$this->response([
  //      		'status' => TRUE,
  //      		'message' => 'Data berhasil disimpan',
  //      		'data' => $data
  //      	], REST_Controller::HTTP_OK);
  //      } else{
  //      	$this->response([
  //      		'status' => FALSE,
  //      		'message' => 'Data failed to add',
  //      	], REST_Controller::HTTP_NOT_FOUND);
  //      }
		// }
/************************************************************************************/



/******************bener banget************************************/
// public function index_post() {

// // $this->load->model('M_uploadsap');

// $data = json_decode(file_get_contents('php://input'), TRUE);
// $data1 = [
//     //      // 'docEntry' => $this->post('docEntry'),
//            'id' => $data['id'],
//             'mobileId' => $data['mobileId'],
//            'docNum' => $data['docNum'],
//            'docDate' => $data['docDate'],
//            'prodNo' => $data['prodNo'],
//            'prodCode' => $data['prodCode'],
//            'prodName' => $data['prodName'],
//            'prodPlanQty' => $data['prodPlanQty'],
//            'prodStatus' => $data['prodStatus'],
//            'routeCode' => $data['routeCode'],
//            'routeName' => $data['routeName'],
//            'sequence' => $data['sequence'],
//            'sequenceQty' => $data['sequenceQty'],
//            'shift' => $data['shift'],
//            'shiftName' => $data['shiftName'],
//            'tanggalMulai' => $data['tanggalMulai'],
//            'tanggalSelesai' => $data['tanggalSelesai'],
//            'jamMulai' => $data['jamMulai'],
//            'jamSelesai' => $data['jamSelesai'],
//            'inQty' => $data['inQty'],
//            'outQty' => $data['outQty'],
//            // 'remarks' => $data['remarks'],   >>>> dlogok
//            'userId'  => $data['userId'],
//            // 'QcName'  => $this->post('QcName'),
//            'posted'  => $data['posted'],
//            'TargetEntry'  => $data['TargetEntry'],
//            'UploadTime'  => $data['UploadTime'],
//            'workCenter'  => $data['workCenter'],
//            'status'  => $data['status']
//        ];
       

//        $data2 = array();
//        $data2 = $data['detail'];

//        $data3 = array();
//        $data3 = $data['detail1'];
   
//        $dataArr = array($data1, $data2, $data3);

//        $cek = $this->M_uploadsap->addHeader($data1, $data2, $data3);
//        if ($cek) {
//          $this->response([
//            'status' => TRUE,
//            'message' => 'Data berhasil disimpan',
//            'data' => $cek
//          ], REST_Controller::HTTP_OK);
//        } else{
//          $this->response([
//            'status' => FALSE,
//            'message' => 'Data failed to add',
//          ], REST_Controller::HTTP_NOT_FOUND);
//        }

// }



// public function index_post() {

// $this->load->model('M_uploadsap');

// $data = json_decode(file_get_contents('php://input'), true);
// $data1 = [
//     //      // 'docEntry' => $this->post('docEntry'),
//            'id' => $data['id'],
//             'mobileId' => $data['mobileId'],
//            'docNum' => $data['docNum'],
//            'docDate' => $data['docDate'],
//            'prodNo' => $data['prodNo'],
//            'prodCode' => $data['prodCode'],
//            'prodName' => $data['prodName'],
//            'prodPlanQty' => $data['prodPlanQty'],
//            'prodStatus' => $data['prodStatus'],
//            'routeCode' => $data['routeCode'],
//            'routeName' => $data['routeName'],
//            'sequence' => $data['sequence'],
//            'sequenceQty' => $data['sequenceQty'],
//            'shift' => $data['shift'],
//            'shiftName' => $data['shiftName'],
//            'tanggalMulai' => $data['tanggalMulai'],
//            'tanggalSelesai' => $data['tanggalSelesai'],
//            'jamMulai' => $data['jamMulai'],
//            'jamSelesai' => $data['jamSelesai'],
//            'inQty' => $data['inQty'],
//            'outQty' => $data['outQty'],
//            'remarks' => $data['remarks'],
//            'userId'  => $data['userId'],
//            // 'QcName'  => $this->post('QcName'),
//            'posted'  => $data['posted'],
//            'TargetEntry'  => $data['TargetEntry'],
//            'UploadTime'  => $data['UploadTime'],
//            'workCenter'  => $data['workCenter'],
//            'status'  => $data['status']
//        ];
       

//        $data3 = array();
//        $data3 = $data['detail1'];
   
//        $dataArr = array($data1, $data3);

//        $cek = $this->M_uploadsap->addHeader($data1, $data3);
//        if ($cek !== FALSE) {
//          $this->response([
//            'status' => TRUE,
//            'message' => 'Data berhasil disimpan',
//            'data' => $cek
//          ], REST_Controller::HTTP_OK);
//        } else{
//          $this->response([
//            'status' => FALSE,
//            'message' => 'Data failed to add',
//          ], REST_Controller::HTTP_NOT_FOUND);
//        }

// }


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
       if ($cek > 0) {
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


// json format
   // {
   //          "id": "3",
   //          "mobileId": "40a25415b59ff096",
   //          "docNum": "S20191019999",
   //          "docDate": "2019-10-04 00:00:00.000",
   //          "prodNo": "10000000",
   //          "prodCode": "7-01-0032",
   //          "prodName": "TARIKAN LACI TOSO 300 A",
   //          "prodPlanQty": "12000.000000",
   //          "prodStatus": "R",
   //          "routeCode": "R035",
   //          "routeName": "INJ160/VAC-ANTIK/ASS",
   //          "sequence": "1",
   //          "sequenceQty": "6000.000000",
   //          "shift": "JmS1",
   //          "shiftName": "Jumat - Shift 1",
   //          "tanggalMulai": "2019-10-04 00:00:00.000",
   //          "tanggalSelesai": "2019-10-04 00:00:00.000",
   //          "jamMulai": "10:41:46",
   //          "jamSelesai": "10:42",
   //          "inQty": "2100.000000",
   //          "outQty": "2000.000000",
   //          "remarks": null,
   //          "userId": "nugroho",
   //          "posted": "1",
   //          "TargetEntry": null,
   //          "UploadTime": null,
   //          "workCenter": "ASS",
   //          "status": "Completed",
   //          "detail": [
   //            {
   //                "lineNumber": "1",
   //                "rejectCode": "R111",
   //                "id": "3",
   //                "hostHeadEntry": "8863",
   //                "rejectName": "Flow Bahan",
   //                "rejectQty": "200"
   //            },
   //            {
   //            "lineNumber": "2",
   //            "rejectCode": "R",
   //            "id": "3",
   //            "hostHeadEntry": "8813",
   //            "rejectName": "Flow",
   //            "rejectQty": "200"
   //        }
   //        ],
   //        "detail1":[
   //           {
   //           "hostHeadEntry": "447",
   //          "id": "13",
   //          "criteria": "C03",
   //          "criteriaDesc": "CT (dtk)",
   //          "standard": "55",
   //          "lineNumber": 1,
   //          "actualResult": "a",
   //          "valueType": "P"
   //        },
   //        {
   //          "hostHeadEntry": "447",
   //          "id": "13",
   //          "criteria": "C04",
   //          "criteriaDesc": "Jml Cvt (Pcs)",
   //          "standard": "2",
   //          "lineNumber": 2,
   //          "actualResult": "b",
   //          "valueType": "P"
   //        }
   //      ]
   //      }
