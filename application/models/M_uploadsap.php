<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_uploadsap extends CI_Model {

function read($workCenter) {
	// if ($docEntry === null) {
	// $this->db->where('docEntry', '138');
	// return $this->db->get('STEM_MOBILE_SHOPFLOORHEADER')->result_array();
		// $this->db->where("status", "0" and "workCenter", "$workCenter");
		// $query = $this->db->query("SELECT * FROM IPP_MOBILE_SHOPFLOORHEADER WHERE posted = '0' AND workCenter = '$workCenter' ORDER BY docEntry DESC" );
		$query = $this->db->query("SELECT * FROM STEM_MOBILE_SHOPFLOORHEADER WHERE posted = '1' AND workCenter = '$workCenter' ORDER BY docEntry DESC" );
		 // return $this->db->get('IPP_MOBILE_SHOPFLOORHEADER')->result_array();
		return $query->result_array();
}

/*********************berner8******************/
	// function addHeader($data) {
		
		// $this->db->insert('STEM_MOBILE_SHOPFLOORHEADER', $data);
		// return $this->db->affected_rows();
 
		

	// }


// /******************NYOBA INSERT 3 TABEL SEKALIGUS*************salah********************/
/*function addHeader($header, $criteria, $reject) {
	$this->db->trans_start();

	 // $id = $this->input->post('id');
	 // $docNum = $this->input->post('docNum');
	 // $prodNo = $this->input->post('prodNo');

	// insert to gheader
	$data = array(
		'docNum' => $header,
		'prodNo' => $header,
		'id'	=>  $header,
);
$this->db->insert('STEM_MOBILE_SHOPFLOORHEADER', $data);

//get docentry header
$docEntry_header = $this->db->insert_id();
$result = array();
// 	foreach($reject AS $key => $val) {
// 		$result[] = array(
// 			'hostHeadEntry' => $docentry_header,
// 			'hostHeadEntry' => $_POST['STEM_MOBILE_SHOPFLOORLINESCRITERIA'][$key]
// 			);
// } 

//MULTIPLE INSERT TO DETAIL TABLE
$this->db->insert_batch('STEM_MOBILE_SHOPFLOORLINESREJECT', $result);
$this->db->trans_complete();

}*/

/*******************coba terus ninput 3 tabvle****************** salah/
// function create ($data1, $data2) {
// 	$this->db->insert( $data1);
// 	$id_table1 = $this->db->insert_id();

// 	array_unshift($data2, array('hostHeadEntry' => $id_table1 ));

// 	$this->db->insert( $data2);
// 	$id_table2 = $this->db->insert_id();

// 	$return_data = array($data1 => $id_table1, $data2 => $d_table2);

// 	return $return_data;
// }



/******************NYOBA lagi dan lagi INSERT 3 TABEL SEKALIGUS******************************BENER***/
// function addHeader($data1, $data2) {
// 	$this->db->trans_start();

// 	$sql1 = "INSERT INTO STEM_MOBILE_SHOPFLOORHEADER (id, docNum, prodNo, mobileId, docDate, prodCode, prodName, prodPlanQty, prodStatus, routeCode, routeName, sequence, sequenceQty, shift, shiftName, tanggalMulai, tanggalSelesai, jamMulai, jamSelesai, inQty, outQty, remarks, userId, posted, TargetEntry, UploadTime, workCenter, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";



// 	$this->db->query($sql1, $data1);
// 	$docEntry_header = $this->db->insert_id();


// /****************bener*****************/
// 	$sql2 = "INSERT INTO STEM_MOBILE_SHOPFLOORLINESREJECT (hostHeadEntry, lineNumber, rejectCode, id, rejectName, rejectQty) VALUES ($docEntry_header,?,?,?,?,?)";
// 	$this->db->query($sql2, $data2);

// 	// $sql3 = "INSERT INTO STEM_MOBILE_SHOPFLOORLINESCRITERIA (hostHeadEntry, id, lineNumber, criteria, criteriaDesc, standard, actualResult, actualRemarks) VALUES ($docEntry_header,?,?,?,?,?,?,?)";
// 	// $this->db->query($sql3, $data3);

// 	$this->db->trans_complete(); 

//  return $this->db->insert_id();  

// }
/*****************************************************************/



/*****************************input array*************************/
function addHeader($data1, $data2) {
	$this->db->trans_start();

	$sql1 = "INSERT INTO STEM_MOBILE_SHOPFLOORHEADER (id, docNum, prodNo, mobileId, docDate, prodCode, prodName, prodPlanQty, prodStatus, routeCode, routeName, sequence, sequenceQty, shift, shiftName, tanggalMulai, tanggalSelesai, jamMulai, jamSelesai, inQty, outQty, remarks, userId, posted, TargetEntry, UploadTime, workCenter, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

	$this->db->query($sql1, $data1);
	$docEntry_header = $this->db->insert_id();

	$sql2 = $this->db->insert_batch('STEM_MOBILE_SHOPFLOORLINESREJECT', $data2, ['hostHeadEntry' => $docEntry_header]); 

	$this->db->trans_complete(); 

 return $this->db->insert_id(); 
}

/********************************************************/



	/****************************************************************/


function putHeader($data, $docEntry) {
	 // $this->db->update('IPP_MOBILE_SHOPFLOORHEADER', $data,['docEntry'=> $docEntry]);
	  $this->db->update('STEM_MOBILE_SHOPFLOORHEADER', $data,['docEntry'=> $docEntry]);
	
	// $this->db->replace('IPP_MOBILE_SHOPFLOORHEADER', $data,['id'=> $id]);
	// $this->db->set('')
	return $this->db->affected_rows();
}

}
