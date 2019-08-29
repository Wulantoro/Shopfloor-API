<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_completeheader extends CI_Model {


function read($workCenter) {
	// $query = $this->db->query("SELECT * FROM IPP_MOBILE_SHOPFLOORHEADER WHERE status = 'Completed' AND workCenter = '$workCenter'  ORDER BY docEntry DESC");
 $query = $this->db->query("SELECT * FROM STEM_MOBILE_SHOPFLOORHEADER WHERE status = 'Completed' AND workCenter = '$workCenter'  ORDER BY docEntry DESC");
	return $query->result_array();
}

/*public function deleteReject( $docEntry = null) {
		$this->db->delete('IPP_MOBILE_SHOPFLOORHEADER', ['docEntry' => $docEntry]);
		return $this->db->affected_rows();
}*/

/*public function delete($docEntry = 'docEntry') {
	$result = $this->db->query("DELETE FROM IPP_MOBILE_SHOPFLOORHEADER WHERE docEntry = $docEntry");

	if ($result) {
		# code...
		return "Data is deleted successfully";
	}else{
		 return "Error has occurred";
	}*/

	public function delete( $docEntry = null) {
		$this->db->delete('IPP_MOBILE_SHOPFLOORHEADER', ['docEntry' => $docEntry]);
		return $this->db->affected_rows();
	}
}
