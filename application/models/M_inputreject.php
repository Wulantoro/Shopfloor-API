<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_inputreject extends CI_Model{

	function read($hostHeadEntry = null) {
		// $query = $this->db->query("SELECT * from STEM_MOBILE_SHOPFLOORLINESREJECT where docentry = '$docentry'");

		// $query = $this->db->query("SELECT * FROM IPP_MOBILE_SHOPFLOORDETAIL2 where docentry = '$docentry'");
		 // $query = $this->db->query("SELECT * FROM IPP_MOBILE_SHOPFLOORDETAIL2 where docentry = '$docentry'");
		$query = $this->db->query("SELECT * FROM STEM_MOBILE_SHOPFLOORLINESREJECT where hostHeadEntry = '$hostHeadEntry'");

		return $query->result_array();
	}

	function addReject($data) {
		// $query = $this->db->insert("INSERT INTO IPP_MOBILE_SHOPFLOORDETAIL2  ")

		// $this->db->insert('IPP_MOBILE_SHOPFLOORDETAIL2', $data);
		$this->db->insert('STEM_MOBILE_SHOPFLOORLINESREJECT', $data);
		$this->db->set('lineNumber', '1');

		return $this->db->affected_rows();
		// return $query->affected_rows();
	}

	function putReject($data, $docEntry) {
		// $this->db->update('IPP_MOBILE_SHOPFLOORDETAIL2', $data, ['id' => $id]);
		$this->db->update('STEM_MOBILE_SHOPFLOORLINESREJECT', $data, ['docEntry' => $docEntry]);

		return $this->db->affected_rows();
	}

	/*function deleteReject($id) {
		$this->db->delete('IPP_MOBILE_SHOPFLOORDETAIL2', ['id' => $id]);
		return $this->db->affected_rows();
	}*/

	function deleterecords($docEntry)
	{
	// $this->db->query("delete  from IPP_MOBILE_SHOPFLOORDETAIL2 where id='".$id."'");
		$this->db->query("delete  from STEM_MOBILE_SHOPFLOORLINESREJECT where docEntry = '".$docEntry."'");
	}

	

}
