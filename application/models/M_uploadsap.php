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

/*********************berner8 lama******************/
	// function addHeader($data) {
		
	// 	$this->db->insert('STEM_MOBILE_SHOPFLOORHEADER', $data);
	// 	return $this->db->affected_rows();
 
		

	// }



/*****************************************************************/


// function addHeader($data1, $data2) {
//   $this->db->trans_start();

//   $this->db->insert('STEM_MOBILE_SHOPFLOORHEADER', $data1);
//   $docEntry_header = $this->db->insert_id();

//   for($i = 0; $i < count($data2); $i++) {
//     $data2[$i]['hostHeadEntry'] = $docEntry_header;
//   }

// 	 $this->db->insert_batch('STEM_MOBILE_SHOPFLOORLINESREJECT', $data2);

//    $dataArr = array($data1, $data2);

//    if ($this->db->trans_status() === FALSE) {
//      # something went wrong
//     $this->db->trans_rollback();
//     return FALSE;
//    } else {
//     # everithing is perfect
//     $this->db->trans_commit();
//     return $dataArr;
    
//    }

// }



/*********************************************************/

/***********SUDAH BENAR KURANG CRITERIA*************************/
// function addHeader($data1, $data2) {
//   $this->db->trans_start();

//   $this->db->insert('STEM_MOBILE_SHOPFLOORHEADER', $data1);
//   $docEntry_header = $this->db->insert_id();

//   for($i = 0; $i < count($data2); $i++) {
//     $data2[$i]['hostHeadEntry'] = $docEntry_header;
//   }

// 	$this->db->insert_batch('STEM_MOBILE_SHOPFLOORLINESREJECT', $data2);


//    $dataArr = array($data1, $data2);

//    if ($this->db->trans_status() === FALSE) {
//      # something went wrong
//     $this->db->trans_rollback();
//     return FALSE;
//    } else {
//     # everithing is perfect
//     $this->db->trans_commit();
//     return $dataArr;
    
//    }

// }
/*******************************************************************/

function addHeader($data1, $data2, $data3) {
  $this->db->trans_start();

  $this->db->insert('STEM_MOBILE_SHOPFLOORHEADER', $data1);
  $docEntry_header = $this->db->insert_id();

  for($i = 0; $i < count($data2); $i++) {
    $data2[$i]['hostHeadEntry'] = $docEntry_header;
  }

	$this->db->insert_batch('STEM_MOBILE_SHOPFLOORLINESREJECT', $data2);

	 for($i = 0; $i < count($data3); $i++) {
    $data3[$i]['hostHeadEntry'] = $docEntry_header;
  }
  	$this->db->insert_batch('STEM_MOBILE_SHOPFLOORLINESCRITERIA', $data3);


   $dataArr = array($data1, $data2, $data3);

   if ($this->db->trans_status() === FALSE) {
     # something went wrong
    $this->db->trans_rollback();
    return FALSE;
   } else {
    # everithing is perfect
    $this->db->trans_commit();
    return $dataArr;
    
   }

}

// function addHeader($data1, $data3) {
//   $this->db->trans_start();

//   $this->db->insert('STEM_MOBILE_SHOPFLOORHEADER', $data1);
//   $docEntry_header = $this->db->insert_id();
 


// 	 for($i = 0; $i < count($data3); $i++) {
//     $data3[$i]['hostHeadEntry'] = $docEntry_header;

//   }
//   	$this->db->insert_batch('STEM_MOBILE_SHOPFLOORLINESCRITERIA', $data3);


//    $dataArr = array($data1, $data3);

//    if ($this->db->trans_status() === FALSE) {
//      # something went wrong
//     $this->db->trans_rollback();
//     return FALSE;
//    } else {
//     # everithing is perfect
//     $this->db->trans_commit();
//     return $dataArr;
    
//    }

// }

function putHeader($data, $docEntry) {
	 // $this->db->update('IPP_MOBILE_SHOPFLOORHEADER', $data,['docEntry'=> $docEntry]);
	  $this->db->update('STEM_MOBILE_SHOPFLOORHEADER', $data,['docEntry'=> $docEntry]);
	
	// $this->db->replace('IPP_MOBILE_SHOPFLOORHEADER', $data,['id'=> $id]);
	// $this->db->set('')
	return $this->db->affected_rows();
}

}
