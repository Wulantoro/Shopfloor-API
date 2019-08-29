<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_simpanheader extends CI_Model {

function read($workCenter) {
	// if ($docEntry === null) {
	// $this->db->where('docEntry', '138');
	// return $this->db->get('STEM_MOBILE_SHOPFLOORHEADER')->result_array();
		// $this->db->where("status", "0" and "workCenter", "$workCenter");
		// $query = $this->db->query("SELECT * FROM IPP_MOBILE_SHOPFLOORHEADER WHERE status = '0' AND workCenter = '$workCenter' ORDER BY docEntry DESC" );
	$query = $this->db->query("SELECT * FROM STEM_MOBILE_SHOPFLOORHEADER WHERE status = '0' AND workCenter = '$workCenter' ORDER BY docEntry DESC" );
		 // return $this->db->get('IPP_MOBILE_SHOPFLOORHEADER')->result_array();
		return $query->result_array();
}


	function addHeader($data) {
		// $this->db->insert('IPP_MOBILE_SHOPFLOORHEADER', $data);
		$this->db->insert('STEM_MOBILE_SHOPFLOORHEADER', $data);
		return $this->db->affected_rows();
	}

function putHeader($data, $docEntry) {
	 // $this->db->update('IPP_MOBILE_SHOPFLOORHEADER', $data,['docEntry'=> $docEntry]);
	  $this->db->update('STEM_MOBILE_SHOPFLOORHEADER', $data,['docEntry'=> $docEntry]);
	
	// $this->db->replace('IPP_MOBILE_SHOPFLOORHEADER', $data,['id'=> $id]);
	// $this->db->set('')
	return $this->db->affected_rows();
}

}