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

/******************NYOBA INSERT 3 TABEL SEKALIGUS*********************************/
// function index_post() {
//   $header = $this->input->post('STEM_MOBILE_SHOPFLOORHEADER', TRUE);
//   $criteria = $this->input->post('STEM_MOBILE_SHOPFLOORLINESCRITERIA', TRUE);
//   $reject = $this->input->post('IPP_MOBILE_SHOPFLOORLINESREJECT', TRUE);
//   $this->M_uploadsap->addHeader($header, $criteria, $reject);
//   redirect('STEM_MOBILE_SHOPFLOORHEADER');
// }



/******************NYOBA LAGI INSERT 3 TABEL SEKALIGUS*********************************/
// public function index_post() {

//            $id = $this->input->post('id');
//             $mobileId = $this->input->post('mobileId');
//            $docNum = $this->input->post('docNum');
//            $docDate = $this->input->post('docDate');
//            $prodNo = $this->input->post('prodNo');
//            $prodCode = $this->input->post('prodCode');
//            $prodName = $this->input->post('prodName');
//            $prodPlanQty = $this->input->post('prodPlanQty');
//            $prodStatus = $this->input->post('prodStatus');
//            $routeCode = $this->input->post('routeCode');
//            $routeName = $this->input->post('routeName');
//            $sequence = $this->input->post('sequence');
//            $sequenceQty = $this->input->post('sequenceQty');
//            $shift = $this->input->post('shift');
//            $shiftName = $this->input->post('shiftName');
//            $tanggalMulai = $this->input->post('tanggalMulai');
//            $tanggalSelesai = $this->input->post('tanggalSelesai');
//            $jamMulai = $this->input->post('jamMulai');
//            $jamSelesai = $this->input->post('jamSelesai');
//            $inQty = $this->input->post('inQty');
//            $outQty = $this->input->post('outQty');
//            $remarks = $this->input->post('remarks');
//            $userId  = $this->input->post('userId');
//            // 'QcName'  => $this->post('QcName'),
//            $posted  = $this->input->post('posted');
//            $TargetEntry  = $this->input->post('TargetEntry');
//            $UploadTime  = $this->input->post('UploadTime');
//            $workCenter  = $this->input->post('workCenter');
//            $status  = $this->input->post('status');

//            $data = array(
//             'id' => $id,
//             'mobileId' => $mobileId,
//            'docNum' => $docNum,
//            'docDate' => $docDate,
//            'prodNo' => $prodNo,
//            'prodCode' => $prodCode,
//            'prodName' => $prodName,
//            'prodPlanQty' => $prodPlanQty,
//            'prodStatus' => $prodStatus,
//            'routeCode' => $routeCode,
//            'routeName' => $routeName,
//            'sequence' => $sequence,
//            'sequenceQty' => $sequenceQty,
//            'shift' => $shift,
//            'shiftName' => $shiftName,
//            'tanggalMulai' => $tanggalMulai,
//            'tanggalSelesai' => $tanggalSelesai,
//            'jamMulai' => $jamMulai,
//            'jamSelesai' => $jamSelesai,
//            'inQty' => $inQty,
//            'outQty' => $outQty,
//            'remarks' => $remarks,
//            'userId'  => $userId,
//            'posted'  => $posted,
//            'TargetEntry'  => $TargetEntry,
//            'UploadTime'  => $UploadTime,
//            'workCenter'  => $workCenter,
//            'status'  => $status
//          );


//       $hostHeadEntry = $this->input->post('hostHeadEntry');
//       $id = $this->input->post('id');
//       $lineNumber = $this->input->post('lineNumber');
//       $rejectCode = $this->input->post('rejectCode');
//       $rejectName = $this->input->post('rejectName');
//       $rejectQty = $this->input->post('rejectQty');
       

//        $data1 = array(
//         'hostHeadEntry' =>$hostHeadEntry,
//       'id' => $id,
//       'lineNumber' => $lineNumber,
//       'rejectCode' => $rejectCode,
//       'rejectName' => $rejectName,
//       'rejectQty' => $rejectQty
//     );

//        $insert = $this->M_uploadsap->create('STEM_MOBILE_SHOPFLOORHEADER', $data);

//        $insert1 = $this->M_uploadsap->create('STEM_MOBILE_SHOPFLOORLINESREJECT', $data1);

//        $insert = $this->M_uploadsap->create('STEM_MOBILE_SHOPFLOORHEADER', $data, 'STEM_MOBILE_SHOPFLOORLINESREJECT', $data1);
 
// }


/******************NYOBA lagi dan lagi INSERT 3 TABEL SEKALIGUS*********************************/
/******************udah mau bener kurang insert array*************************************/
// public function index_post() {
//   $this->load->model('M_uploadsap');

//   // get form variable
//    // $id = $this->input->post('id');
//    //  $docNum = $this->input->post('docNum');      
//    //  $prodNo = $this->input->post('prodNo');

//             $id = $this->input->post('id');
//             $mobileId = $this->input->post('mobileId');
//            $docNum = $this->input->post('docNum');
//            $docDate = $this->input->post('docDate');
//            $prodNo = $this->input->post('prodNo');
//            $prodCode = $this->input->post('prodCode');
//            $prodName = $this->input->post('prodName');
//            $prodPlanQty = $this->input->post('prodPlanQty');
//            $prodStatus = $this->input->post('prodStatus');
//            $routeCode = $this->input->post('routeCode');
//            $routeName = $this->input->post('routeName');
//            $sequence = $this->input->post('sequence');
//            $sequenceQty = $this->input->post('sequenceQty');
//            $shift = $this->input->post('shift');
//            $shiftName = $this->input->post('shiftName');
//            $tanggalMulai = $this->input->post('tanggalMulai');
//            $tanggalSelesai = $this->input->post('tanggalSelesai');
//            $jamMulai = $this->input->post('jamMulai');
//            $jamSelesai = $this->input->post('jamSelesai');
//            $inQty = $this->input->post('inQty');
//            $outQty = $this->input->post('outQty');
//            $remarks = $this->input->post('remarks');
//            $userId  = $this->input->post('userId');
//            $posted  = $this->input->post('posted');
//            $TargetEntry  = $this->input->post('TargetEntry');
//            $UploadTime  = $this->input->post('UploadTime');
//            $workCenter  = $this->input->post('workCenter');
//            $status  = $this->input->post('status');
  

//     // $data1 = [
//     //     'id' => $this->input->post('id'),
//     //         'mobileId' => $this->input->post('mobileId'),
//     //        'docNum' => $this->input->post('docNum'),
//     //        'docDate' => $this->input->post('docDate'),
//     //        'prodNo' => $this->input->post('prodNo'),
//     //        'prodCode' => $this->input->post('prodCode'),
//     //        'prodName' => $this->input->post('prodName'),
//     //        'prodPlanQty' => $this->input->post('prodPlanQty'),
//     //        'prodStatus' => $this->input->post('prodStatus'),
//     //        'routeCode' => $this->input->post('routeCode'),
//     //        'routeName' => $this->input->post('routeName'),
//     //        'sequence' => $this->input->post('sequence'),
//     //        'sequenceQty' => $this->input->post('sequenceQty'),
//     //        'shift' => $this->input->post('shift'),
//     //        'shiftName' => $this->input->post('shiftName'),
//     //        'tanggalMulai' => $this->input->post('tanggalMulai'),
//     //        'tanggalSelesai' => $this->input->post('tanggalSelesai'),
//     //        'jamMulai' => $this->input->post('jamMulai'),
//     //        'jamSelesai' => $this->input->post('jamSelesai'),
//     //        'inQty' => $this->input->post('inQty'),
//     //        'outQty' =>$this->input->post('outQty'),
//     //        'remarks' => $this->input->post('remarks'),
//     //        'userId'  => $this->input->post('userId'),
//     //        'posted'  => $this->input->post('posted'),
//     //        'TargetEntry'  => $this->input->post('TargetEntry'),
//     //        'UploadTime'  => $this->input->post('UploadTime'),
//     //        'workCenter'  => $this->input->post('workCenter'),
//     //        'status'  => $this->input->post('status'),
//     //      ];


// /*****************************field reject*********************************************/
// /********************kalo pake yang bawah 9ini ga dipake*********************/
// // $data2 = array(
// //     // 'lineNumber' => $this->input->post('lineNumber'),
// //     // 'rejectCode' => $this->input->post('rejectCode'),
// //     // 'id' => $this->input->post('id'),
// //     //  'hostHeadEntry' => $this->input->post('hostHeadEntry'),
// //     //   'rejectName' => $this->input->post('rejectName'),
// //     //   'rejectQty' => $this->input->post('rejectQty')
// //     );

//       $lineNumber = $this->input->post('lineNumber');
//      $rejectCode = $this->input->post('rejectCode');
//     $id = $this->input->post('id');
//      $hostHeadEntry = $this->input->post('hostHeadEntry');
//       $rejectName = $this->input->post('rejectName');
//       $rejectQty = $this->input->post('rejectQty');


//       /*************field criteria*************************************************************/
//       // $id = $this->input->post('id');
//       // $hostHeadEntry = $this->input->post('hostHeadEntry');
//       // $lineNumber = $this->post('lineNumber');
//       // $criteria = $this->post('criteria');
//       // $criteriaDesc= $this->post('criteriaDesc');
//       // $valueType = $this->post('valueType');
//       // $standard = $this->post('standard');
//       // $actualResult= $this->post('actualResult');
//       // $actualRemarks= $this->post('actualRemarks');


//       $data1 = array($id, $docNum, $prodNo, $mobileId, $docDate, $prodCode, $prodName, $prodPlanQty, $prodStatus, $routeCode, $routeName, $sequence, $sequenceQty, $shift, $shiftName, $tanggalMulai, $tanggalSelesai, $jamMulai, $jamSelesai, $inQty, $outQty, $remarks, $userId, $posted, $TargetEntry, $UploadTime, $workCenter, $status);
   

//       $data2 = array($lineNumber, $rejectCode, $id, $rejectName, $rejectQty );
    

//       // $data3 = array($id, $lineNumber, $criteria, $criteriaDesc, $standard, $actualResult, $actualRemarks);

//       $Alldata = array($data1, $data2);
    

//     $cek = $this->M_uploadsap->addHeader($data1, $data2);
//       // $cek = $this->M_uploadsap->addHeader($data1);

//      if ($cek) {
//          $this->response([
//            'status' => TRUE,
//            'message' => 'Data berhasil disimpan',
//            'data' => $Alldata
//          ], REST_Controller::HTTP_OK);
//        } else{
//          $this->response([
//            'status' => FALSE,
//            'message' => 'Data failed to add',
//          ], REST_Controller::HTTP_NOT_FOUND);
//        }
// }
/****************************************************************************************************************************/

/********************************coba input array*******************************************************/
public function index_post() {
  $this->load->model('M_uploadsap');

 $id = $this->input->post('id');
            $mobileId = $this->input->post('mobileId');
           $docNum = $this->input->post('docNum');
           $docDate = $this->input->post('docDate');
           $prodNo = $this->input->post('prodNo');
           $prodCode = $this->input->post('prodCode');
           $prodName = $this->input->post('prodName');
           $prodPlanQty = $this->input->post('prodPlanQty');
           $prodStatus = $this->input->post('prodStatus');
           $routeCode = $this->input->post('routeCode');
           $routeName = $this->input->post('routeName');
           $sequence = $this->input->post('sequence');
           $sequenceQty = $this->input->post('sequenceQty');
           $shift = $this->input->post('shift');
           $shiftName = $this->input->post('shiftName');
           $tanggalMulai = $this->input->post('tanggalMulai');
           $tanggalSelesai = $this->input->post('tanggalSelesai');
           $jamMulai = $this->input->post('jamMulai');
           $jamSelesai = $this->input->post('jamSelesai');
           $inQty = $this->input->post('inQty');
           $outQty = $this->input->post('outQty');
           $remarks = $this->input->post('remarks');
           $userId  = $this->input->post('userId');
           $posted  = $this->input->post('posted');
           $TargetEntry  = $this->input->post('TargetEntry');
           $UploadTime  = $this->input->post('UploadTime');
           $workCenter  = $this->input->post('workCenter');
           $status  = $this->input->post('status');

           $data1 = array($id, $docNum, $prodNo, $mobileId, $docDate, $prodCode, $prodName, $prodPlanQty, $prodStatus, $routeCode, $routeName, $sequence, $sequenceQty, $shift, $shiftName, $tanggalMulai, $tanggalSelesai, $jamMulai, $jamSelesai, $inQty, $outQty, $remarks, $userId, $posted, $TargetEntry, $UploadTime, $workCenter, $status);

           $data2 = json_decode(file_get_contents('php://input'), TRUE);

    

      
      $cek = $this->M_uploadsap->addHeader($data1, $data2);

      if ($cek ) {
      # code...
      $this->response([
        'status' => TRUE,
        'message' => 'Criteria berhasil di tambah',
        'data' => $newArr
      ], REST_Controller::HTTP_OK);
    }else {
      $this->response([
        'status' => FALSE,
        'message' => 'Criteria failed to add',
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
